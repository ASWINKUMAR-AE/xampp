<?php
session_start();
?>
<?php

?>
 <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "kani";
          
          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          $email = $_SESSION['eamil'];
          $name = $_SESSION['name']; 
          // Fetch data from the database
                $query = "SELECT *  FROM user WHERE email = '$email' AND user_name='$name'  ";
                $result = mysqli_query($conn, $query);

                // Display data in the table
              

                // Close the database connection
                mysqli_close($conn);
                ?>


<head>
        <meta charset="utf-8">
        <title>kani</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
     

    

        <link rel="stylesheet" href="css/addtocart.css">
           
           <link href="css/bootstrap.min.css" rel="stylesheet">
   
           <link rel="website icon" type="png"  href="img/logo.png"  >
           <link href="css/style.css" rel="stylesheet">
        
             
   

    </head>

<style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  width: 100%;
  background-color:rgb(43, 42, 42) !important;
  place-items: center;

}
::selection{
  background: #1a75ff;
  color: #fff;
}
.wrapper{
  overflow: hidden;
  max-width: 590px;
 
  padding: 30px;
  border-radius: 15px;
  
}
.wrapper .title-text{
  display: flex;
  width: 200%;
}
.wrapper .title{
  width: 50%;
  font-size: 35px;
  font-weight: 600;
  text-align: center;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.wrapper .slide-controls{
  position: relative;
  display: flex;
  height: 50px;
  width: 100%;
  overflow: hidden;
  margin: 30px 0 10px 0;
  justify-content: space-between;
  border: 1px solid lightgrey;
  border-radius: 15px;
}
.slide-controls .slide{
  height: 100%;
  width: 100%;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  text-align: center;
  line-height: 48px;
  cursor: pointer;
  z-index: 1;
  transition: all 0.6s ease;
}
.slide-controls label.signup{
  color: #000;
}
.slide-controls .slider-tab{
  position: absolute;
  height: 100%;
  width: 50%;
  left: 0;
  z-index: 0;
  background:orange;
  border-radius: 15px;

  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
input[type="radio"]{
  display: none;
}
#signup:checked ~ .slider-tab{
  left: 50%;
}
#signup:checked ~ label.signup{
  color: #fff;
  cursor: default;
  user-select: none;
}
#signup:checked ~ label.login{
  color: #000;
}
#login:checked ~ label.signup{
  color: #000;
}
#login:checked ~ label.login{
  cursor: default;
  user-select: none;
}
.wrapper .form-container{
  width: 100%;
  overflow: hidden;
}
.form-container .form-inner{
  display: flex;
  width: 200%;
}
.form-container .form-inner form{
  width: 50%;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.form-inner form .field{
  height: 50px;
  width: 100%;
  margin-top: 20px;
}
.form-inner form .field input{
  height: 100%;
  width: 100%;
  outline: none;
  padding-left: 15px;
  border-radius: 15px;
  border: 1px solid lightgrey;
  border-bottom-width: 2px;
  font-size: 17px;
  transition: all 0.3s ease;
}
.form-inner form .field input:focus{
  border-color: orange;
  /* box-shadow: inset 0 0 3px #fb6aae; */
}
.form-inner form .field input::placeholder,select{
  color: orange;
  transition: all 0.3s ease;
}
form .field input:focus::placeholder{
  color: #1a75ff;
}
.form-inner form .pass-link{
  margin-top: 5px;
}
.form-inner form .signup-link{
  text-align: center;
  margin-top: 30px;
}
.form-inner form .pass-link a,
.form-inner form .signup-link a{
  color: #1a75ff;
  text-decoration: none;
}
.form-inner form .pass-link a:hover,
.form-inner form .signup-link a:hover{
  text-decoration: underline;
}
form .btn{
  height: 50px;
  width: 100%;
  border-radius: 15px;
  position: relative;
  overflow: hidden;
}
form .btn .btn-layer{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
background:orange;
  border-radius: 15px;
  transition: all 0.4s ease;;
}
form .btn:hover .btn-layer{
  left: 0;
}
form .btn input[type="submit"]{
  height: 100%;
  width: 100%;
  z-index: 1;
  position: relative;
  background: none;
  border: none;
  color: #fff;
  padding-left: 0;
  border-radius: 15px;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
}

</style>


<div class="wrapper col-12">
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      
        <div class="form-inner">

        <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "kani";
                
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                
                
                // Fetch data from the database
                $query = "SELECT * FROM user WHERE eamil = '$email' AND name='$name'  ";
                $result = mysqli_query($conn, $query);

                // Display data in the table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr scope='row'>";
                    
                  

            
                ?>
            </tbody>
<center><h1>EDIT YOUR DATA</h1></center>
          <form action="upd.php" class="upd " method="post" >
          <div class="field">
              <input type="text" placeholder="Name" name="name"  value="<?php echo $row['name'];?>"id="name" required>
            </div>
            <div id="er1"></div>
            <div class="field">
              <input type="text" placeholder="Email Address" name="email"  value="<?php echo $row['eamil'];?>" id="eamilsign" required>
            </div>
            <div id="er2"></div>

            <div class="field">
              <input type="password" placeholder="Password" name="password" value="<?php echo $row['password'];?>" id="passwordsign" required>
            </div>
            <div id="er3"></div>

           

            <div class="field">
              <input type="text" placeholder="+91 Phone number"  value="<?php echo $row['phone_number'];?>" name="pho" id="pho"   required>
            </div>
            <div id="er4"></div>

            <div class="field">
              <input type="text" placeholder="Address" name="address"  value="<?php echo $row['address'];?>" id="address" required>
            </div>
            <div id="er5"></div>

            <div class="field">
              <input type="text" placeholder="state" name="state" id="state"  value="<?php echo $row['state'];?>" required>
            </div>
            <div id="er6"></div>
            <div class="field">
              <input type="text" placeholder="city" name="city" id="city"   value="<?php echo $row['city'];?>"required>
            </div>
            <div id="er7"></div>
        <br>
  


            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" onclick="" name="upd" id="upd" value="Edit">
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php
          
        }

        // Close the database connection
        mysqli_close($conn);?>




<?php


// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kani";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $phone_number = $conn->real_escape_string($_POST['pho']);
    $address = $conn->real_escape_string($_POST['address']);
    $state = $conn->real_escape_string($_POST['state']);
    $city = $conn->real_escape_string($_POST['city']);

    // Get session variables for the original email and name to locate the correct user
    $original_email = $_SESSION['email'];
    $original_name = $_SESSION['name'];

    // Update the database
    $query = "UPDATE user SET 
              name='$name', 
              eamil='$email', 
              password='$password', 
              phone_number='$phone_number', 
              address='$address', 
              state='$state', 
              city='$city'
              WHERE eamil='$original_email' AND name='$original_name'";

    if ($conn->query($query) === TRUE) {
        echo "<script> alert('update the your data successfully'); window.location.href='user.php';  </script> ";
        // Optionally update session variables if needed
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
