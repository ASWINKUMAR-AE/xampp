<?php
  // Database connection
  $servername = "localhost";
  $username = "root";  // Use your database username
  $password = "";  // Use your database password
  $dbname = "file_manager";  // The database name

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
?>
