<?php
// hotel_backend/get_rooms.php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Update these values if needed
$host = 'localhost';
$user = 'root';
$pass = ''; // your password
$dbname = 'hotel_booking';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);

$rooms = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rooms[] = $row;
    }
}

$conn->close();
echo json_encode($rooms);
?>
