 
  

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" type="image/png" sizes="16x16" href="images/logo.jpg">    
<title>Rabbi Academy</title>

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
		  background-color: #652D90;
	  }
	   /* hide mobile version by default */
  .logo .mobile {
    display: none;
  }
  /* when screen is less than 600px wide
     show mobile version and hide desktop */
  @media (max-width: 600px) {
    .logo .mobile {
      display: block;
	  text-align:center;
    }
    .logo .desktop {
      display: none;
    }
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
	$typ = $_POST['typ'];
	if(!empty($_POST["submit"]))   // if records were not empty
     {
		 session_start();
	$loginquery ="SELECT * FROM register WHERE typ='$typ' and regno='$username' && pword='$password'"; //selecting matching records
	$result=mysqli_query($conn, $loginquery); //executing
	$row=mysqli_fetch_array($result);
	 if($row['typ'] == "Super Admin")
    {
      
		$_SESSION['SESS_LAST_NAME'] = $row['typ'];
		$_SESSION["SESS_LAST_NAMEE"] = $row['regno'];
		
        header('Location: amaster.php');
    }
    else if($row['typ'] == "Center")
    {
     	$_SESSION['SESS_LAST_NAME'] = $row['typ'];
		$_SESSION["SESS_LAST_NAMEE"] = $row['regno'];
          header('Location: tmaster.php');
    }
	else if($row['typ'] == "Parents")
    {
       	$_SESSION['SESS_LAST_NAME'] = $row['typ'];
		$_SESSION["SESS_LAST_NAMEE"] = $row['regno'];
          header('Location: pmaster.php');
    }

    else
    {
        $_SESSION['status'] = "Email / Password is Invalid";
        header('Location: index.php');
    }
	                     
	
	 }
}
?>
<div class="limiter" >
<div class="container-login100" style="background-image:url(login_bk.png);">
<div  >

<form class="login100-form validate-form" action="" method="post"> 

<span style="color:red;"><?php echo $message; ?></span> 
<div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">

<div class="form-group">
    <label for="exampleFormControlSelect1" style="color:#FFFFFF">Type</label>
    <select class="form-control" id="typ" name="typ"  style="border-radius:8px 8px 8px 8px;border:1px solid rgb(114, 114, 114)">
      <option value="Super Admin">Super Admin</option>
      <option value="Center">Center</option>
	  <option value="Parents">Parents</option>
  
   
    </select>
  </div>
</div>
<div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">
  <label for="exampleFormControlSelect1" style="color:#ffffff">Regno</label>
<input class="input100" type="text" name="username" style="background-color:#FFFFFF" placeholder="Type your Regno">
</div>
<div class="wrap-input100 validate-input" data-validate="Password is required">
  <label for="exampleFormControlSelect1" style="color:#FFFFFF">Password</label>
<input class="input100" type="password" name="password" style="background-color:#FFFFFF" placeholder="Type your password">
</div>
<div class="text-right p-t-8 p-b-31">

</div>

<div class="wrap-login100-form-btn">
<div class="login100-form-bgbtn"></div>
      <input type="submit" id="buttn" class="login100-form-btn" style="background-color:#DDC884; color:#000000" name="submit" value="login" />
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