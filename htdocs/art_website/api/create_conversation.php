<?php
/**
 * AJAX Handler to Create/Fetch Conversation
 */
session_start();
require_once '../config/db.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Login required']);
    exit();
}

$user1_id = $_SESSION['user_id'];
$data = json_decode(file_get_contents('php://input'), true);
$user2_id = isset($data['artist_id']) ? intval($data['artist_id']) : 0;

if ($user2_id <= 0 || $user1_id == $user2_id) {
    echo json_encode(['success' => false, 'message' => 'Invalid user']);
    exit();
}

// Check if conversation exists
$stmt = $conn->prepare("SELECT id FROM conversations WHERE (user1_id = ? AND user2_id = ?) OR (user1_id = ? AND user2_id = ?)");
$stmt->bind_param("iiii", $user1_id, $user2_id, $user2_id, $user1_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $conv_id = $row['id'];
} else {
    // Create new
    $stmt = $conn->prepare("INSERT INTO conversations (user1_id, user2_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user1_id, $user2_id);
    $stmt->execute();
    $conv_id = $stmt->insert_id;
}

echo json_encode(['success' => true, 'conv_id' => $conv_id]);
$conn->close();
?>
