<?php
session_start();
require 'db/db.php'; // Database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo "<script>
                alert('You must be logged in to submit a command.');
                window.history.back(); // Redirect to the previous page
              </script>";
        exit;
    }

    // Sanitize inputs
    $user_id = $_SESSION['user_id'];
    $art_id = filter_input(INPUT_POST, 'art_id', FILTER_SANITIZE_NUMBER_INT);
    $artist_id = filter_input(INPUT_POST, 'artist_id', FILTER_SANITIZE_NUMBER_INT);
    $command_text = filter_input(INPUT_POST, 'command_text', FILTER_SANITIZE_STRING);

    // Validate inputs
    if (empty($art_id) || empty($artist_id) || empty($command_text)) {
        echo "<script>
                alert('All fields are required.');
                window.history.back(); // Redirect to the previous page
              </script>";
        exit;
    }

    // Insert command into the database
    $sql = "INSERT INTO artwork_commands (user_id, artist_id, art_id, command_text) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('iiis', $user_id, $artist_id, $art_id, $command_text);
        if ($stmt->execute()) {
            echo "<script>
                   
                    window.history.back(); // Redirect to the previous page
                  </script>";
        } else {
            echo "<script>
                    alert('Error submitting command: " . addslashes($stmt->error) . "');
                    window.history.back(); // Redirect to the previous page
                  </script>";
        }
        $stmt->close();
    } else {
        echo "<script>
                alert('Database error: " . addslashes($conn->error) . "');
                window.history.back(); // Redirect to the previous page
              </script>";
    }

    $conn->close();
} else {
    echo "<script>
            alert('Invalid request.');
            window.history.back(); // Redirect to the previous page
          </script>";
}
?>
