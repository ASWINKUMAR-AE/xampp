<?php
/**
 * Get Wallet Balance API
 * 
 * Endpoint: GET /api/get-wallet.php?driver_id=ID
 * Returns the current wallet balance for a driver
 */

// Enable error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 0); // Don't display errors to client
ini_set('log_errors', 1);

// Set JSON response header
header('Content-Type: application/json');

// Include database connection
require_once '../config/database.php';

// Check request method
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Method not allowed. Use GET request.'
    ]);
    exit;
}

// Get and validate driver_id
$driver_id = $_GET['driver_id'] ?? null;

if (empty($driver_id)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'driver_id is required'
    ]);
    exit;
}

// Validate driver_id is numeric
if (!is_numeric($driver_id) || $driver_id <= 0) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Invalid driver_id. Must be a positive number.'
    ]);
    exit;
}

try {
    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, driver_id, balance, created_at, updated_at FROM driver_wallet WHERE driver_id = ?");
    $stmt->bind_param("i", $driver_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if driver wallet exists
    if ($result->num_rows === 0) {
        http_response_code(404);
        echo json_encode([
            'success' => false,
            'message' => 'Driver wallet not found'
        ]);
        exit;
    }
    
    // Fetch wallet data
    $wallet = $result->fetch_assoc();
    
    // Return balance
    echo json_encode([
        'success' => true,
        'balance' => (float)$wallet['balance'],
        'driver_id' => (int)$wallet['driver_id']
    ]);
    
    $stmt->close();
    
} catch (Exception $e) {
    // Log error
    error_log("Get Wallet API Error: " . $e->getMessage());
    
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'An error occurred while fetching wallet balance'
    ]);
}

$conn->close();
?>
