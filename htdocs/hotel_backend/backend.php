<?php
$servername = "localhost";
$username = "root"; // Change if needed
$password = ""; // Change if needed
$dbname = "hotel_booking"; // Change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the POST data
data = json_decode(file_get_contents("php://input"), true);

$name = $data['name'];
$email = $data['email'];
$phone = $data['phone'];
$checkIn = $data['checkIn'];
$checkOut = $data['checkOut'];
$roomType = $data['roomType'];
$guests = $data['guests'];
$paymentMethod = $data['paymentMethod'];

// SQL to insert data
$sql = "INSERT INTO bookings (name, email, phone, check_in, check_out, room_type, guests, payment_method) 
        VALUES ('$name', '$email', '$phone', '$checkIn', '$checkOut', '$roomType', '$guests', '$paymentMethod')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "message" => "Booking successful"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error: " . $sql . "\n" . $conn->error]);
}

$conn->close();
?>
