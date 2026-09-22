
<?php
session_start();

include 'connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare and execute SQL query
    $sql = "SELECT * FROM user_id WHERE user_email = ? AND user_pwd = ? ";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Login successful
            $row = $result->fetch_assoc();
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_email'] = $row['user_email'];
            $_SESSION['phone_number'] = $row['phone_number'];
            $_SESSION['address'] = $row['address'];
     

            echo "<script>window.history.go(-2);</script>";
            exit();
        } else {
            // Login failed
            echo "<div class='alert alert-danger' role='alert'>Invalid username or password !!</div>";
        }
        $stmt->close();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>