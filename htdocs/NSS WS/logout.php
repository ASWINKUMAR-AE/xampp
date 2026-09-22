<?php
session_start();
include('db.php');

date_default_timezone_set('Asia/Kolkata');

// Check if the user is logged in
if (!isset($_SESSION['usr_name']) || !isset($_SESSION['role'])) {
    header('Location: login_in.php');
    exit();
}

$role = $_SESSION['role'];
$username = $_SESSION['usr_name'];
$logout_time = date('Y-m-d H:i:s');

// Save logout datetime
if ($role == "admin") {
    $update_logout_time_sql = "UPDATE admin SET last_logout='$logout_time' WHERE reg_no='$username'";
} elseif ($role == "super admin") {
    $update_logout_time_sql = "UPDATE admin SET last_logout='$logout_time' WHERE username='$username'";
} else {
    $update_logout_time_sql = "UPDATE volunteers SET last_logout='$logout_time' WHERE username='$username'";
}

if ($conn->query($update_logout_time_sql) === TRUE) {
    // Logout successful
    session_destroy();
    header('Location: login_in.php');
    exit();
} else {
    // Handle the error
    echo "Error updating logout time: " . $conn->error;
    session_destroy();
    header('Location: login_in.php');
    exit();
}
?>
