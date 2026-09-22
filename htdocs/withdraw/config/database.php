<?php
/**
 * Database Configuration
 * 
 * Centralized database connection for the Driver Wallet Withdrawal System
 * Uses mysqli for MySQL database connectivity
 */

// Database credentials
$host = "localhost";
$user = "admin";
$password = "wave@2025_zethub";
$database = "cabit";

// Enable mysqli error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Create database connection
    $conn = new mysqli($host, $user, $password, $database);
    
    // Set charset to UTF-8
    $conn->set_charset("utf8mb4");

    // Optional: Set timezone (adjust as needed)
    $conn->query("SET time_zone = '+05:30'");

} catch (Exception $e) {
    // Log error
    error_log("Database connection failed: " . $e->getMessage());
    
    // Return error response if called via API
    if (php_sapi_name() !== 'cli') {
        // Clear any previous output
        if (ob_get_length()) ob_clean();
        
        header('Content-Type: application/json');
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'message' => 'Database connection failed. Please try again later.'
        ]);
        exit;
    }
    
    die("Database connection failed: " . $e->getMessage());
}
?>
