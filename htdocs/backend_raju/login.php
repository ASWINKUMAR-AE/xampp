<?php
session_start();

// Allow CORS for only localhost:5173
header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // For preflight requests
    http_response_code(200);
    exit();
}

include 'conn.php';

$data = json_decode(file_get_contents('php://input'), true);

$email = $data['email'];
$password = $data['password'];

$response = [];

if (!empty($email) && !empty($password)) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    $result = $stmt->get_result();
    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            $response = [
                "status" => "success",
                "email" => $user['email'],
                "role" => $user['role']
            ];
        } else {
            $response = ["status" => "error", "message" => "Invalid password"];
        }
    } else {
        $response = ["status" => "error", "message" => "User not found"];
    }
} else {
    $response = ["status" => "error", "message" => "Missing fields"];
}

echo json_encode($response);
?>
