<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
</head>
<body>
  <h1>Welcome to Dashboard</h1>
  <p>Logged in as: <?php echo $_SESSION['user_email']; ?></p>
  <a href="logout.php">Logout</a>
</body>
</html>
