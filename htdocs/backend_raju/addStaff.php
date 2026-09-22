<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

include 'conn.php'; // Include your database connection file

// Get input data
$data = json_decode(file_get_contents("php://input"), true);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Only POST method is allowed"]);
    exit;
}

if (empty($data)) {
    echo json_encode(["status" => "error", "message" => "No input data received"]);
    exit;
}

// Validate required fields
$requiredFields = ["id", "name", "dept"];
$missingFields = [];

foreach ($requiredFields as $field) {
    if (!isset($data[$field]) || empty(trim($data[$field]))) {
        $missingFields[] = $field;
    }
}

if (!empty($missingFields)) {
    echo json_encode([
        "status" => "error", 
        "message" => "Missing required fields: " . implode(", ", $missingFields)
    ]);
    exit;
}

// Sanitize inputs
$id = trim($data['id']);
$name = trim($data['name']);
$dept = trim($data['dept']);

// Check if staff ID already exists
$checkQuery = $conn->prepare("SELECT id FROM staff WHERE id = ?");
$checkQuery->bind_param("s", $id);
$checkQuery->execute();
$checkQuery->store_result();

if ($checkQuery->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "Staff ID already exists"]);
    $checkQuery->close();
    $conn->close();
    exit;
}
$checkQuery->close();

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO staff (id, name, dept) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $id, $name, $dept);

// Execute the statement
if ($stmt->execute()) {
    echo json_encode([
        "status" => "success", 
        "message" => "Staff added successfully",
        "data" => ["id" => $id, "name" => $name, "dept" => $dept]
    ]);
} else {
    echo json_encode([
        "status" => "error", 
        "message" => "Error storing data: " . $stmt->error
    ]);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>