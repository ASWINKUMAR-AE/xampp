<?php
/**
 * Withdraw Cash API
 * 
 * Endpoint: POST /api/withdraw.php
 * Processes driver cash withdrawal with PhonePe payout integration
 * 
 * Request Body (JSON):
 * {
 *   "driver_id": 10,
 *   "amount": 1000
 * }
 */

// Enable error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// Set JSON response header
header('Content-Type: application/json');

// Include required files
require_once '../config/database.php';
require_once '../config/phonepe-config.php';

// Check request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Method not allowed. Use POST request.'
    ]);
    exit;
}

// Get JSON input
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Validate JSON
if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Invalid JSON format'
    ]);
    exit;
}

// Extract and validate parameters
$driver_id = $data['driver_id'] ?? null;
$amount = $data['amount'] ?? null;

// Validation: Required fields
if (empty($driver_id) || empty($amount)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'driver_id and amount are required'
    ]);
    exit;
}

// Validation: Numeric values
if (!is_numeric($driver_id) || !is_numeric($amount)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'driver_id and amount must be numeric'
    ]);
    exit;
}

// Convert to appropriate types
$driver_id = (int)$driver_id;
$amount = (float)$amount;

// Validation: Positive values
if ($driver_id <= 0 || $amount <= 0) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'driver_id and amount must be positive numbers'
    ]);
    exit;
}

// Validation: Minimum withdrawal amount (₹100)
if ($amount < 100) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Minimum withdrawal amount is ₹100'
    ]);
    exit;
}

try {
    // ===== START TRANSACTION =====
    $conn->begin_transaction();
    
    // Lock wallet row to prevent race conditions
    $stmt = $conn->prepare("SELECT id, driver_id, balance FROM driver_wallet WHERE driver_id = ? FOR UPDATE");
    $stmt->bind_param("i", $driver_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if wallet exists
    if ($result->num_rows === 0) {
        $conn->rollback();
        http_response_code(404);
        echo json_encode([
            'success' => false,
            'message' => 'Driver wallet not found'
        ]);
        exit;
    }
    
    $wallet = $result->fetch_assoc();
    $current_balance = (float)$wallet['balance'];
    $wallet_id = $wallet['id'];
    
    $stmt->close();
    
    // Validation: Sufficient balance
    if ($current_balance < $amount) {
        $conn->rollback();
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => 'Insufficient balance',
            'currentBalance' => $current_balance,
            'requestedAmount' => $amount
        ]);
        exit;
    }
    
    // Calculate new balance
    $new_balance = $current_balance - $amount;
    
    // Ensure balance doesn't go negative (extra safety check)
    if ($new_balance < 0) {
        $conn->rollback();
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => 'Transaction would result in negative balance'
        ]);
        exit;
    }
    
    // Generate unique withdrawal order ID
    $withdrawalOrderId = 'WD' . $driver_id . '_' . time() . '_' . rand(1000, 9999);
    
    // ===== PHONEPE PAYOUT INTEGRATION =====
    // Note: For production, you should fetch driver's bank details from database
    // For now, using dummy beneficiary details
    $beneficiary = [
        'name' => 'Driver ' . $driver_id,
        'vpa' => 'driver' . $driver_id . '@paytm', // Dummy UPI ID
        // For bank transfer, use:
        // 'account' => '1234567890',
        // 'ifsc' => 'SBIN0001234'
    ];
    
    // Initiate PhonePe payout
    $payoutResponse = initiatePhonePePayout($withdrawalOrderId, $amount, $beneficiary);
    
    // Log PhonePe response
    error_log("PhonePe Payout Response for Order $withdrawalOrderId: " . json_encode($payoutResponse));
    
    // Check PhonePe response
    // Note: In sandbox mode, you might get different response codes
    // Adjust this logic based on actual PhonePe API responses
    $payoutSuccess = false;
    
    if ($payoutResponse['success'] && isset($payoutResponse['data'])) {
        // Direct boolean or status check depending on library version
        // Some responses might double wrap data
        $responseData = $payoutResponse['data'];
        
        $responseCode = $responseData['code'] ?? null;
        // Check for nested data if present (common in PhonePe responses)
        $innerData = $responseData['data'] ?? $responseData;
        $responseState = $innerData['state'] ?? $innerData['responseCode'] ?? null;
        
        // Check if payout was successful or pending
        // PhonePe states: COMPLETED, PENDING, FAILED, PAYMENT_SUCCESS
        if ($responseState === 'COMPLETED' || $responseState === 'PENDING' || $responseCode === 'PAYMENT_SUCCESS') {
            $payoutSuccess = true;
        }
    }
    
    // Removed manual simulation override as it is now handled in initiatePhonePePayout
    
    if (!$payoutSuccess) {
        $conn->rollback();
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'message' => 'Payment gateway failed. Please try again later.',
            'orderId' => $withdrawalOrderId
        ]);
        exit;
    }
    
    // ===== UPDATE DATABASE =====
    
    // 1. Deduct amount from driver_wallet
    $updateStmt = $conn->prepare("UPDATE driver_wallet SET balance = ?, updated_at = NOW() WHERE driver_id = ?");
    $updateStmt->bind_param("di", $new_balance, $driver_id);
    $updateStmt->execute();
    $updateStmt->close();
    
    // 2. Insert withdrawal record in earnings table
    $earningsStmt = $conn->prepare("INSERT INTO earnings (driver_id, ride_id, amount, type, notes, created_at) VALUES (?, NULL, ?, 'withdraw', ?, NOW())");
    $notes = "Driver cash withdrawal - Order: $withdrawalOrderId";
    $earningsStmt->bind_param("ids", $driver_id, $amount, $notes);
    $earningsStmt->execute();
    $earningsStmt->close();
    
    // ===== COMMIT TRANSACTION =====
    $conn->commit();
    
    // Return success response
    http_response_code(200);
    echo json_encode([
        'success' => true,
        'message' => 'Withdrawal successful',
        'remainingBalance' => $new_balance,
        'withdrawnAmount' => $amount,
        'orderId' => $withdrawalOrderId,
        'timestamp' => date('Y-m-d H:i:s')
    ]);
    
} catch (Exception $e) {
    // Rollback transaction on any error
    if ($conn->connect_errno === 0) {
        $conn->rollback();
    }
    
    // Log error
    error_log("Withdrawal API Error: " . $e->getMessage());
    error_log("Stack trace: " . $e->getTraceAsString());
    
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'An error occurred while processing withdrawal. Please try again.'
    ]);
}

$conn->close();
?>
