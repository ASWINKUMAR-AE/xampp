<?php
/**
 * AJAX Handler to Fetch Messages
 */
session_start();
require_once '../config/db.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Login required']);
    exit();
}

$user_id = $_SESSION['user_id'];
$conv_id = isset($_GET['conv_id']) ? intval($_GET['conv_id']) : 0;

if ($conv_id <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid conversation']);
    exit();
}

// Security: Check if user belongs to the conversation
$check_stmt = $conn->prepare("SELECT 1 FROM conversations WHERE id = ? AND (user1_id = ? OR user2_id = ?)");
$check_stmt->bind_param("iii", $conv_id, $user_id, $user_id);
$check_stmt->execute();
if ($check_stmt->get_result()->num_rows == 0) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit();
}

// Fetch messages
$stmt = $conn->prepare("SELECT sender_id, message, created_at FROM messages WHERE conversation_id = ? ORDER BY created_at ASC");
$stmt->bind_param("i", $conv_id);
$stmt->execute();
$result = $stmt->get_result();

$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = [
        'sender_id' => $row['sender_id'],
        'message' => htmlspecialchars($row['message']),
        'time' => date('H:i', strtotime($row['created_at'])),
        'is_me' => ($row['sender_id'] == $user_id)
    ];
}

echo json_encode(['success' => true, 'messages' => $messages]);
$conn->close();
?>
