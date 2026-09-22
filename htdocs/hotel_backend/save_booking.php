<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Start session
session_start();

// Database connection
$host = "localhost";
$user = "root"; // Update if needed
$password = ""; // Update if needed
$database = "hotel_booking";

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed: " . $conn->connect_error]));
}

// Read JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Validate required fields
$requiredFields = ['name', 'email', 'phone', 'checkIn', 'checkOut', 'roomType', 'guests', 'pan', 'grandTotal'];
foreach ($requiredFields as $field) {
    if (!isset($data[$field])) {
        die(json_encode(["status" => "error", "message" => "Missing field: $field"]));
    }
}

// Sanitize input
$name = $conn->real_escape_string($data['name']);
$email = $conn->real_escape_string($data['email']);
$phone = $conn->real_escape_string($data['phone']);
$checkIn = $conn->real_escape_string($data['checkIn']);
$checkOut = $conn->real_escape_string($data['checkOut']);
$roomType = $conn->real_escape_string($data['roomType']);
$guests = (int)$data['guests'];
$panId = $conn->real_escape_string($data['pan']);
$totalPrice = (float)($data['grandTotal']);

// Insert booking into database
$stmt = $conn->prepare("INSERT INTO bookings (name, email, phone, check_in, check_out, room_type, guests, pan_id, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssisd", $name, $email, $phone, $checkIn, $checkOut, $roomType, $guests, $panId, $totalPrice);

if ($stmt->execute()) {
    $_SESSION['booking'] = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'checkIn' => $checkIn,
        'checkOut' => $checkOut,
        'roomType' => $roomType,
        'guests' => $guests,
        'panId' => $panId,
        'totalPrice' => $totalPrice
    ];
    echo json_encode(["status" => "success", "message" => "Booking saved successfully."]);
} else {
    echo json_encode(["status" => "error", "message" => "Error saving booking: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>

