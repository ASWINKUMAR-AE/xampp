<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" type="image/png" sizes="16x16" href="images/logo.jpg">    
<title>SRWWO</title>

<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" type="text/css" href="./log1/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="./log1/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="./log1/material-design-iconic-font.min.css">

<link rel="stylesheet" type="text/css" href="./log1/animate.css">

<link rel="stylesheet" type="text/css" href="./log1/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="./log1/animsition.min.css">

<link rel="stylesheet" type="text/css" href="./log1/select2.min.css">

<link rel="stylesheet" type="text/css" href="./log1/daterangepicker.css">

<link rel="stylesheet" type="text/css" href="./log1/util.css">
<link rel="stylesheet" type="text/css" href="./log1/main.css">
<style type="text/css">
	  #buttn{
		  color:#fff;
		  background-color: #3c5462;
	  }
	  </style>
  
</head>
<body>
<?php
include 'DatabaseConfig.php'; //INCLUDE CONNECTION
error_reporting(0); // hide undefine index errors
ob_start();
//session_start(); // temp sessions
if(isset($_POST['submit']))   // if button is submit
{
	$username = $_POST['username'];  //fetch records from login form
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"]))   // if records were not empty
     {
	$loginquery ="SELECT * FROM login WHERE username='$username' && password='$password'"; //selecting matching records
	$result=mysqli_query($conn, $loginquery); //executing
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row))  // if matching records in the array & if everything is right
								{
                                    	//$_SESSION["user_id"] = $row['u_id'];  put user id into temp session
                                    	echo '<script type="text/javascript">window.location.href="home.php";</script>';
										// header("refresh:1;url=master.php"); // redirect to index.php page
	                            } 
							else
							    {
                                      	$message = "Invalid Username or Password!"; // throw error
                                }
	 }
	
	
}
?>
<div class="limiter">
<div class="container-login100" style="background-image: url(dist/img/back3.jpg);">
<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

<form class="login100-form validate-form" action="" method="post"> 
<span class="login100-form-title p-b-49">
SRWWO
</span>
<span style="color:red;"><?php echo $message; ?></span> 
<div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">
<span class="label-input100">Username</span>
<input class="input100" type="text" name="username" placeholder="Type your username">
</div>
<div class="wrap-input100 validate-input" data-validate="Password is required">
<span class="label-input100">Password</span>
<input class="input100" type="password" name="password" placeholder="Type your password">
</div>
<div class="text-right p-t-8 p-b-31">

</div>
<div class="wrap-login100-form-btn">
<div class="login100-form-bgbtn"></div>
      <input type="submit" id="buttn" class="login100-form-btn" name="submit" value="login" />
</div>


</form>
<!-- <div class="text-center p-t-40 p-b-31">
Not registered?<a href="registration.php"> <strong style="color:#750203;">
Create an account </strong>
</a>
</div> -->
</div>

</div>

</div>
<div id="dropDownSelect1"></div>

<script type="text/javascript" async="" src="./log1/analytics.js.download"></script>

<script src="./log1/jquery-3.2.1.min.js.download"></script>

<script src="./log1/animsition.min.js.download"></script>

<script src="./log1/popper.js.download"></script>
<script src="./log1/bootstrap.min.js.download"></script>

<script src="./log1/select2.min.js.download"></script>

<script src="./log1/moment.min.js.download"></script>
<script src="./log1/daterangepicker.js.download"></script>

<script src="./log1/countdowntime.js.download"></script>

<script src="./log1/main.js.download"></script>

<script async="" src="./log1/js"></script>
<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>


</body></html>