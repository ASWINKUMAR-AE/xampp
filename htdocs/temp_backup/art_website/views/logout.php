<?php
// Start session
session_start();

// Destroy all session data
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Clear cookies related to session if any
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, 
        $params["path"], $params["domain"], 
        $params["secure"], $params["httponly"]
    );
}

// Redirect the user to the login page or homepage
header("Location: login.php");
exit();
?>
