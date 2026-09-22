
<?php
session_start();

include 'connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $password = $_POST["password"];

    // Prepare and execute SQL query
    $sql = "SELECT * FROM admin WHERE admin_name = ? AND pwd = ? ";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ss", $name, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Login successful
            $row = $result->fetch_assoc();
            $_SESSION['admin_name'] = $row['admin_name'];
            $_SESSION['admin_id'] = $row['admin_id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['pwd'] = $row['pwd'];
            $_SESSION['date_join'] = $row['date_join'];
     

            header("Location: admin_index.php");
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
<head>
        <meta charset="utf-8">
        <title>kani</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
     

    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="css/addtocart.css">
           
           <link href="css/bootstrap.min.css" rel="stylesheet">
   
           <link rel="website icon" type="png"  href="img/logo.png"  >
        
             
   

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
.slide-controls label.login{
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
#signup:checked ~ label.login{
  color: #fff;
  cursor: default;
  user-select: none;
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
  
      <div class="title-text">
        <div class="title login " style="color:orange !important;"> <i class='fas fa-user-edit' style='font-size:24px'></i>Admin Login </div>
        
          
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <label for="login" class="slide login" style="color:white !important;">Login</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">




          <form action="#" class="login col-5" method="post">
            <div class="field col-5">
              <input type="text" placeholder="Username" name="name"  required>
            </div>
            <div class="field col-5">
              <input type="password" placeholder="Password" name="password" required>
            </div>
        
            <div class="field btn col-5">
              <div class="btn-layer"></div>
              <input type="submit" value="Login">
            </div>

          </form>





