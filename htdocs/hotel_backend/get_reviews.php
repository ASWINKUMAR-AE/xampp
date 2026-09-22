<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

// Database configuration
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

// Query to get reviews
$sql = "SELECT id, name, rating, comment, date FROM reviews ORDER BY date DESC";
$result = $conn->query($sql);

$reviews = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $reviews[] = [
            "id" => $row["id"],
            "name" => $row["name"],
            "rating" => (int)$row["rating"],
            "comment" => $row["comment"],
            "date" => $row["date"]
        ];
    }
}

$conn->close();

echo json_encode([
    "status" => "success",
    "data" => $reviews
]);
?>