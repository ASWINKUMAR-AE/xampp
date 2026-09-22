<?php
// ---- DATABASE SETTINGS ----
$conn = new mysqli("localhost", "root", "", "signup_db");
if ($conn->connect_error) {
    die("DB connection failed");
}

// ---- FORM SUBMIT ----
$msg = "";
if (isset($_POST['signup'])) {
    $u = $_POST['username'];
    $e = $_POST['email'];
    $p = $_POST['password'];

    $sql = "INSERT INTO users (username,email,password)
            VALUES ('$u','$e','$p')";
    if ($conn->query($sql)) {
        $msg = "Signup Successful";
    } else {
        $msg = "Error";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>

<h3>Signup</h3>
<p><?php echo $msg; ?></p>

<form method="post">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit" name="signup">Signup</button>
</form>

</body>
</html>