<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Content-Type: application/json");
include 'conn.php';

$query = "SELECT id, name, dept FROM staff";
$result = $conn->query($query);

$staff = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $staff[] = $row;
    }
}

echo json_encode($staff);
$conn->close();
?>