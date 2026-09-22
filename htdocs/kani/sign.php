<?php
// Connect to your database (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$database = "kani";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle signup form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $pho = $_POST["pho"];
    $address = $_POST["address"];
    $state = $_POST["state"];
    $city = $_POST["city"];

    // Hash the password
    

    // SQL query to insert user data into the database
    $sql = "INSERT INTO user (name, eamil, password, address, state, city,phone_number) 
            VALUES ('$name', '$email', '$password', '$address', '$state', '$city','$pho')";

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
