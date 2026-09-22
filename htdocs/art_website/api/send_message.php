<?php
/**
 * AJAX Handler to Send Message
 */
session_start();
require_once '../config/db.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Login required']);
    exit();
}

$sender_id = $_SESSION['user_id'];
$data = json_decode(file_get_contents('php://input'), true);
$conv_id = isset($data['conv_id']) ? intval($data['conv_id']) : 0;
$message = isset($data['message']) ? trim($data['message']) : '';

if ($conv_id <= 0 || empty($message)) {
    echo json_encode(['success' => false, 'message' => 'Invalid message']);
    exit();
}

$stmt = $conn->prepare("INSERT INTO messages (conversation_id, sender_id, message) VALUES (?, ?, ?)");
$stmt->bind_param("iis", $conv_id, $sender_id, $message);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => $stmt->error]);
}

$conn->close();
?>
