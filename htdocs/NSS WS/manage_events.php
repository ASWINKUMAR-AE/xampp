<?php 
session_start();

// Check if the user is logged in and has the role of super admin
if ($_SESSION['role'] !== 'super admin') {
    // If not, redirect to the login page or an error page
    header('Location: login_in.php');
    exit;
}

include 'header.php';
?>

<?php include 'footer.php'; ?>
