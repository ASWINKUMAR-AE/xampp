<?php
session_start();
include 'log_activity.php';
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
// Log the logout activity
logActivity("User logged out", $user_id);
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Redirect to login page
header("Location: ../presentation/");


exit();
?>


