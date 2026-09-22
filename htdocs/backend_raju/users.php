<?php
include 'conn.php'; // Include the database connection file
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json"); // Important to set JSON header

// Get input data
$data = json_decode(file_get_contents("php://input"), true);

// Validate required fields
$requiredFields = ["username", "email", "password", "role", "dept"];
foreach ($requiredFields as $field) {
    if (!isset($data[$field]) || empty($data[$field])) {
        echo json_encode(["success" => false, "message" => "Missing required field: $field"]);
        exit;
    }
}

// Additional validation based on role
if ($data["role"] === "student" && (empty($data["reg_no"]))) {
    echo json_encode(["success" => false, "message" => "Registration number is required for students."]);
    exit;
}

if (($data["role"] === "staff" || $data["role"] === "admin") && (empty($data["emp_id"]))) {
    echo json_encode(["success" => false, "message" => "Employee ID is required for staff/admin."]);
    exit;
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (username, email, password, role, dept, reg_no, emp_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param(
    "sssssss", 
    $data["username"],
    $data["email"],
    $data["password"],
    $data["role"],
    $data["dept"],
    $data["reg_no"],  // Can be empty for staff/admin
    $data["emp_id"]   // Can be empty for students
);

// Execute the statement
if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "User registered successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
