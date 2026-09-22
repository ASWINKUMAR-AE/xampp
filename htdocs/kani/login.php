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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
  
    $email = $_POST["email"];
    $password = $_POST["password"];
 

 
    
$query="SELECT * FROM user WHERE eamil='$email' AND password='$password'";
$result=mysqli_query($conn,$query);

if(mysqli_num_rows($result)==1){
    $user=mysqli_fetch_assoc($result);
    //echo "Welcome".$user['name']."<br>";
    session_start();
    $_SESSION['name'] = $user['name'];
    $_SESSION['eamil']= $user['eamil'];
    $_SESSION['address']= $user['address'];
  


     // Save user name in session
    // header("Location: add.php"); // Redirect to add.php
    echo '<script>window.history.go(-2);</script>';
    exit();

}
else{
    echo "<script>
    alert('Your data are invalid !!!');
    window.location.href='form.php';
    </script>";
}
mysqli_close($conn); 
}

?>
