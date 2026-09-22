<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Content-Type: application/json");
include 'conn.php';

$query = "SELECT id, candidate_name, roll_number, school_name, total_marks FROM ads_students";
$result = $conn->query($query);

$students = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

echo json_encode($students);
$conn->close();
?>