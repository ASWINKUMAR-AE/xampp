<?php
session_start();
include_once "../db/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$artist_id = $_POST['artist_id'];
$artwork_id = $_POST['artwork_id'];

// Validate user, artist, and artwork IDs
$user_check_sql = "SELECT id FROM users WHERE id = $user_id";
$artist_check_sql = "SELECT id FROM users WHERE id = $artist_id";
$artwork_check_sql = "SELECT id FROM art WHERE id = $artwork_id";

$user_exists = $conn->query($user_check_sql)->num_rows > 0;
$artist_exists = $conn->query($artist_check_sql)->num_rows > 0;
$artwork_exists = $conn->query($artwork_check_sql)->num_rows > 0;

if (!$user_exists || !$artist_exists || !$artwork_exists) {
    echo "Invalid data. Please try again.";
    exit();
}

// Check if the user already liked this artwork
$check_sql = "SELECT * FROM liked WHERE user_id = $user_id AND artwork_id = $artwork_id";
$check_result = $conn->query($check_sql);

if ($check_result->num_rows > 0) {
    echo "You have already liked this artwork.";
} else {
    // Insert the like data
    $insert_sql = "INSERT INTO liked (user_id, artist_id, artwork_id) VALUES ($user_id, $artist_id, $artwork_id)";
    if ($conn->query($insert_sql)) {
        echo "Artwork liked successfully!";
    } else {
        echo "Failed to like the artwork.";
    }
}
$conn->close();
?>
