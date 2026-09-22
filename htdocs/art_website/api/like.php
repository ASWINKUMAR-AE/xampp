<?php
/**
 * AJAX Handler for Artwork Likes
 * Handlers: Like/Unlike toggle, Duplicate prevention, Live count return
 */
session_start();
require_once '../config/db.php';

header('Content-Type: application/json');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Please login to like artworks.', 'unauthorized' => true]);
    exit();
}

$user_id = $_SESSION['user_id'];

// Robust data retrieval: Support both $_POST (from $.post) and JSON (from fetch/axios)
$artwork_id = 0;
if (isset($_POST['artwork_id'])) {
    $artwork_id = intval($_POST['artwork_id']);
} else {
    $data = json_decode(file_get_contents('php://input'), true);
    $artwork_id = isset($data['artwork_id']) ? intval($data['artwork_id']) : 0;
}

if ($artwork_id <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid artwork ID.']);
    exit();
}

// 1. Check if already liked
$check_stmt = $conn->prepare("SELECT id FROM likes WHERE user_id = ? AND artwork_id = ?");
$check_stmt->bind_param("ii", $user_id, $artwork_id);
$check_stmt->execute();
$result = $check_stmt->get_result();
$is_liked = ($result->num_rows > 0);
$check_stmt->close();

if ($is_liked) {
    // Already liked, so UNLIKE
    $stmt = $conn->prepare("DELETE FROM likes WHERE user_id = ? AND artwork_id = ?");
    $stmt->bind_param("ii", $user_id, $artwork_id);
    $action = 'unliked';
} else {
    // Not liked yet, so LIKE
    $stmt = $conn->prepare("INSERT INTO likes (user_id, artwork_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $artwork_id);
    $action = 'liked';
}

if ($stmt->execute()) {
    $stmt->close();
    
    // 2. Synchronize likes_count in artworks table
    // Re-count all likes for this artwork to ensure absolute accuracy
    $sync_stmt = $conn->prepare("UPDATE artworks SET likes_count = (SELECT COUNT(*) FROM likes WHERE artwork_id = ?) WHERE id = ?");
    $sync_stmt->bind_param("ii", $artwork_id, $artwork_id);
    $sync_stmt->execute();
    $sync_stmt->close();

    // 3. Retrieve the updated count for the real-time UI
    $count_stmt = $conn->prepare("SELECT likes_count FROM artworks WHERE id = ?");
    $count_stmt->bind_param("i", $artwork_id);
    $count_stmt->execute();
    $new_count = $count_stmt->get_result()->fetch_assoc()['likes_count'];
    $count_stmt->close();

    echo json_encode([
        'success' => true,
        'status' => 'success', // For compatibility with older frontend logic
        'action' => $action,
        'likes_count' => $new_count,
        'new_count' => $new_count
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Database error occurred.']);
}

$conn->close();
?>
