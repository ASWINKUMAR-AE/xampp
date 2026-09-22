<?php
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

include 'conn.php'; // your database connection

// Handle preflight (OPTIONS) request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Then continue your code...
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $name = $data['name'];
    $id = $data['id'];

    $sql = "SELECT * FROM staff WHERE name='$name' AND id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $staff = mysqli_fetch_assoc($result);
        echo json_encode(["message" => "Login successful", "staff" => $staff]);
    } else {
        echo json_encode(["error" => "Invalid Name or ID"]);
    }
} else {
    echo json_encode(["error" => "Invalid input"]);
}
?>
