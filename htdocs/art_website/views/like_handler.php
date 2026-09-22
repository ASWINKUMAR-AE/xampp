<?php
include_once "../db/db.php";
header('Content-Type: application/json');

session_start();
$response = ['success' => false];

$data = json_decode(file_get_contents("php://input"), true);
$artwork_id = $data['artwork_id'];
$user_id = $_SESSION['user_id']; // Current logged-in user ID

if (!empty($artwork_id) && !empty($user_id)) {
    // Check if the user already liked the post
    $stmt = $conn->prepare("SELECT id FROM liked WHERE user_id = ? AND artwork_id = ?");
    $stmt->bind_param("ii", $user_id, $artwork_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // If already liked, remove the like (unlike)
        $stmt = $conn->prepare("DELETE FROM liked WHERE user_id = ? AND artwork_id = ?");
        $stmt->bind_param("ii", $user_id, $artwork_id);
    } else {
        // If not liked, add a like
        $stmt = $conn->prepare("INSERT INTO liked (user_id, artist_id, artwork_id, liked_at) 
                                VALUES (?, (SELECT artist_id FROM art WHERE id = ?), ?, NOW())");
        $stmt->bind_param("iii", $user_id, $artwork_id, $artwork_id);
    }

    // Execute the query
    if ($stmt->execute()) {
        $response['success'] = true;
    }
    $stmt->close();
}

echo json_encode($response);
?>
