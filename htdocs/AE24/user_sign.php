<?php
include 'connect.php'; 

// Handle signup form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_name = $_POST["user_name"];
    $user_email = $_POST["user_email"];
    $user_pwd = $_POST["user_pwd"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];



    

    // Prepare and execute SQL query to insert user data into the database
    $sql = "INSERT INTO user_id (user_name, user_email, user_pwd, phone_number,address) 
            VALUES ('$user_name', '$user_email', '$user_pwd','  $phone_number' ,'$address')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to login page after successful signup
        header("Location: form.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
