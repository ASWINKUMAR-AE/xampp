<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$host = "localhost";
$user = "root";
$password = "";
$database = "hotel_booking";

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die(json_encode([
        "status" => "error",
        "message" => "Database connection failed: " . $conn->connect_error,
        "details" => [
            "host" => $host,
            "user" => $user,
            "database" => $database
        ]
    ]));
}

// Get the POST data
$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

// Log received data for debugging
file_put_contents('debug.log', "Received data: " . print_r($data, true) . "\n", FILE_APPEND);

// Validate input
if (empty($data['name']) || empty($data['comment']) || !isset($data['rating'])) {
    echo json_encode([
        "status" => "error",
        "message" => "All fields are required",
        "received_data" => $data
    ]);
    exit;
}

// Sanitize input
$name = $conn->real_escape_string(trim($data['name']));
$comment = $conn->real_escape_string(trim($data['comment']));
$rating = intval($data['rating']);
$date = date('Y-m-d H:i:s');

// Check if reviews table exists
$tableCheck = $conn->query("SHOW TABLES LIKE 'reviews'");
if ($tableCheck->num_rows == 0) {
    echo json_encode([
        "status" => "error",
        "message" => "Reviews table does not exist"
    ]);
    exit;
}

// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO reviews (name, rating, comment, date) VALUES (?, ?, ?, ?)");
$stmt->bind_param("siss", $name, $rating, $comment, $date);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "success",
        "message" => "Review added successfully",
        "inserted_id" => $stmt->insert_id
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Error inserting review: " . $stmt->error,
        "sql_error" => $conn->error
    ]);
}

$stmt->close();
$conn->close();
?>