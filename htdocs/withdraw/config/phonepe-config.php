<?php
/**
 * PhonePe Payment Gateway Configuration
 * 
 * Configuration for PhonePe Payout API integration
 * Supports both sandbox and production environments
 */

// Set mode: 'sandbox' for testing, 'production' for live
$mode = "sandbox";

// PhonePe credentials based on environment
if ($mode === "production") {
    $merchantId = "SU2511161600435516360983";
    $saltKey = "e4ad84e6-86aa-46f3-9afd-ee3f7d7d330a";
    $saltIndex = 1;
    $apiEndpoint = "https://api.phonepe.com/apis/hermes";
} else {
    // Sandbox credentials
    $merchantId = "M2311K0VI0OR7";
    $saltKey = "MzE1MzU0NWEtMzc4ZS00MzZiLTgyOTUtYjQ1YWJmMzc3MjE2";
    $saltIndex = 1;
    $apiEndpoint = "https://api-preprod.phonepe.com/apis/pg-sandbox";
    $saltIndex = 1;
    $apiEndpoint = "https://api-preprod.phonepe.com/apis/pg-sandbox";
}

// Simulation mode for Sandbox to bypass actual API calls (since we might not have valid Payout credentials)
// Set to true to simulate successful payouts in Sandbox
define('PHONEPE_SIMULATION', $mode === 'sandbox');

/**
 * Generate X-VERIFY header for PhonePe API
 * 
 * @param string $payload Base64 encoded payload
 * @return string X-VERIFY header value
 */
function generatePhonePeSignature($payload) {
    global $saltKey, $saltIndex;
    
    // Create signature: SHA256(base64_payload + /pg/v1/pay + salt_key) + ### + salt_index
    $stringToHash = $payload . "/pg/v1/pay" . $saltKey;
    $sha256Hash = hash('sha256', $stringToHash);
    
    return $sha256Hash . '###' . $saltIndex;
}

/**
 * Generate X-VERIFY header for Payout API
 * 
 * @param string $payload Base64 encoded payload
 * @return string X-VERIFY header value
 */
function generatePayoutSignature($payload) {
    global $saltKey, $saltIndex;
    
    // For payout: SHA256(base64_payload + /v3/debit + salt_key) + ### + salt_index
    $stringToHash = $payload . "/v3/debit" . $saltKey;
    $sha256Hash = hash('sha256', $stringToHash);
    
    return $sha256Hash . '###' . $saltIndex;
}

/**
 * Make PhonePe API call using cURL
 * 
 * @param string $endpoint API endpoint path
 * @param array $data Request payload data
 * @param string $method HTTP method (POST/GET)
 * @return array API response
 */
function makePhonePeApiCall($endpoint, $data, $method = 'POST') {
    global $apiEndpoint, $merchantId;
    
    // Prepare payload
    $payload = base64_encode(json_encode($data));
    
    // Generate signature based on endpoint
    if (strpos($endpoint, 'debit') !== false) {
        $xVerify = generatePayoutSignature($payload);
    } else {
        $xVerify = generatePhonePeSignature($payload);
    }
    
    // Full API URL
    $url = $apiEndpoint . $endpoint;
    
    // Initialize cURL
    $ch = curl_init($url);
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'X-VERIFY: ' . $xVerify,
        'X-MERCHANT-ID: ' . $merchantId
    ]);
    
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['request' => $payload]));
    }
    
    // Execute request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    
    curl_close($ch);
    
    // Handle cURL errors
    if ($curlError) {
        error_log("PhonePe API cURL Error: " . $curlError);
        return [
            'success' => false,
            'message' => 'Payment gateway connection failed',
            'error' => $curlError
        ];
    }
    
    // Parse response
    $responseData = json_decode($response, true);
    
    // Log response for debugging
    error_log("PhonePe API Response (HTTP $httpCode): " . $response);
    
    return [
        'success' => $httpCode === 200,
        'httpCode' => $httpCode,
        'data' => $responseData
    ];
}

/**
 * Initiate PhonePe Payout
 * 
 * @param string $orderId Unique withdrawal order ID
 * @param float $amount Amount to transfer
 * @param array $beneficiary Beneficiary details (name, account, ifsc, vpa)
 * @return array Payout response
 */
function initiatePhonePePayout($orderId, $amount, $beneficiary) {
    global $merchantId;
    
    // Convert amount to paise (PhonePe uses smallest currency unit)
    $amountInPaise = (int)($amount * 100);
    
    // Prepare payout request
    $payoutData = [
        'merchantId' => $merchantId,
        'merchantTransactionId' => $orderId,
        'amount' => $amountInPaise,
        'instrumentType' => 'UPI_INTENT', // or 'BANK_ACCOUNT' based on your needs
        'instrumentDetails' => [
            'vpa' => $beneficiary['vpa'] ?? null,
            'accountNumber' => $beneficiary['account'] ?? null,
            'ifsc' => $beneficiary['ifsc'] ?? null,
            'name' => $beneficiary['name'] ?? 'Driver'
        ]
    ];
    
    // Remove null values
    $payoutData['instrumentDetails'] = array_filter($payoutData['instrumentDetails']);
    
    // SIMULATION MODE
    if (defined('PHONEPE_SIMULATION') && PHONEPE_SIMULATION) {
        error_log("SIMULATION MODE: Simulating successful payout for Order $orderId");
        return [
            'success' => true,
            'httpCode' => 200,
            'data' => [
                'success' => true,
                'code' => 'PAYMENT_SUCCESS',
                'message' => 'Simulated Success',
                'data' => [
                    'merchantId' => $merchantId,
                    'merchantTransactionId' => $orderId,
                    'transactionId' => 'P' . time(),
                    'amount' => $amountInPaise,
                    'state' => 'COMPLETED',
                    'responseCode' => 'SUCCESS'
                ]
            ]
        ];
    }

    // Make API call
    return makePhonePeApiCall('/v3/debit', $payoutData, 'POST');
}

/**
 * Check PhonePe Payout Status
 * 
 * @param string $orderId Withdrawal order ID
 * @return array Status response
 */
function checkPayoutStatus($orderId) {
    global $merchantId;
    
    $endpoint = "/v3/debit/{$merchantId}/{$orderId}/status";
    
    return makePhonePeApiCall($endpoint, [], 'GET');
}
?>
