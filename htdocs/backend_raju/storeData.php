<?php
include 'conn.php'; // Include the database connection file
header("Access-Control-Allow-Origin: *");

// Get input data
$data = json_decode(file_get_contents("php://input"), true);

// Validate required fields
$requiredFields = ["candidateName", "rollNumber", "dob", "fatherName", "motherName", "totalMarks", "email", "address", "phone", "school_name"];
foreach ($requiredFields as $field) {
    if (!isset($data[$field]) || empty($data[$field])) {
        echo json_encode(["status" => "error", "message" => "Missing required field: $field"]);
        exit;
    }
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO ads_students (candidate_name, roll_number, dob, father_name, mother_name, total_marks, email, address, phone_number, school_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param(
    "sssssissss", 
    $data["candidateName"], 
    $data["rollNumber"], 
    $data["dob"], 
    $data["fatherName"], 
    $data["motherName"], 
    $data["totalMarks"], 
    $data["email"], 
    $data["address"], 
    $data["phone"], 
    $data["school_name"]  // Corrected the key to match the database column name
);

// Execute the statement
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Data inserted successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error storing data: " . $stmt->error]);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
