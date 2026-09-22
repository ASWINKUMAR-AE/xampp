<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Rabbi Academy</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <link href="//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
    <!--/Style-CSS -->
    <link rel="stylesheet" href="index_css.css" type="text/css" media="all" />

    <!--//Style-CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
    <style>
        .dropdown{
            outline: none;
    margin-bottom: 15px;
    font-size: 16px;
    color: #999;
    text-align: left;
    padding: 14px 20px;
    width: 100%;
    display: inline-block;
    box-sizing: border-box;
        outline: none;
    background: #f7fafc;
    border: 1px solid #e5e5e5;
    transition: .3s ease;
    -webkit-transition: .3s ease;
    border-radius: 40px;
        }
        .mystyle {

  display:none;
  
}

        #buttn{
          transition: all 0.2s;
          color: #089dfa;
          font-weight: bolder;
        }
        
option{ 

    background-color: transparent !important;

   
    

}
select,input{
    border-radius:50px !important; 
    border:1px solid red !important;
    background-color: transparent !important;
   
}
select:hover{
   
}
select:focus{
    border:1px solid orange !important;
}
        #buttn:hover{
          transform: scale(1.02);
          background-color: blueviolet !important;
          cursor: pointer;
          color: black;
        }
        html, body {
    overflow-y: hidden;
    overflow:hidden;
}
label{
color:black !important;
background:red;
border-radius:20px;
padding:5px;
}
#signup{
display:none;
}
@media (max-width:568px) {
.im{
    margin-top:-60px;
    width:200px;
    margin-left:20px;
    background-color:transparent !important;
    /* display:none; */
}
}
    </style>

</head>

<body>
<?php
include 'DatabaseConfig.php'; // INCLUDE CONNECTION

error_reporting(0); // HIDE UNDEFINED INDEX ERRORS
ob_start();
session_start(); // START SESSION

if(isset($_POST['submit'])) { // CHECK IF FORM IS SUBMITTED
    $username = $_POST['username']; // FETCH RECORDS FROM LOGIN FORM
    $password = $_POST['password'];
    $typ = $_POST['typ'];
    
    if(!empty($_POST["submit"])) { // CHECK IF RECORDS WERE NOT EMPTY
        $loginquery = "SELECT * FROM register WHERE typ='$typ' AND regno='$username' AND pword='$password'"; // SELECT MATCHING RECORDS
        $result = mysqli_query($conn, $loginquery); // EXECUTE QUERY
        $count = mysqli_num_rows($result); // COUNT THE ROWS
        
        if($count == 1) { // IF USER EXISTS
            $row = mysqli_fetch_assoc($result);
            $_SESSION['SESS_LAST_NAME'] = $row['typ'];
            $_SESSION["SESS_LAST_NAMEE"] = $row['regno'];
            
            if($typ == "Super Admin") {
                header('Location: master1.php'); // REDIRECT TO ADMIN PAGE
            } elseif($typ == "Center") {
                header('Location: master.php'); // REDIRECT TO CENTER PAGE
            } elseif($typ == "Parents") {
                header('Location: master2.php'); // REDIRECT TO PARENTS PAGE
            }
        } else {
            $_SESSION['status'] = "Incorrect Username or Password"; // SET SESSION STATUS
            header('Location: index.php'); // REDIRECT TO LOGIN PAGE
        }
    }
}
?>


 <!-- form section start -->
 <section class="w3l-hotair-form" style="background-image:url(dist/img/bg.jpg) !important;">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid ">
                <div class="main-hotair ">
                    <div class="content-wthree "style="
background-color: white !important;opacity: 0.5;">
                        
                        <form class="login100-form validate-form" id="login"  action="" method="post" > 
                        <h2>Log In</h2>
<span style="color:red;"><?php echo $message; ?></span> 
<div  class="wrap-input100 validate-input m-b-23" data-validate="Username is required" >

<div class="form-group" >
    <!-- <label for="exampleFormControlSelect1" style="color:#FFFFFF">Type</label> -->
    <select class="form-control" id="typ" name="typ"  style="border-radius:8px 8px 8px 8px;border:1px solid rgb(114, 114, 114)">
    <option value="">Select Your Unit</option>
    <option value="Super Admin">Madurai</option>
      <option value="Center">Virudhunagar</option>
	  <option value="Parents">Tenkasi</option>
    
   
    </select>
  </div>
</div>
<div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">
  <!-- <label for="exampleFormControlSelect1" style="color:#ffffff">PF No</label> -->
<input class="input100" type="text" name="username" style="background-color:#FFFFFF" placeholder="PF Number">
</div>

<div class="text-right p-t-8 p-b-31">

</div>

<div class="wrap-login100-form-btn">
<div class="login100-form-bgbtn"></div>
      <input type="submit" id="buttn" class="login100-form-btn" style="background-color: red !important;text-align: center; color:white;" name="submit" value="Login" />
</div>

<center style='color:gray;' > Not a Member? <span style="color:blue; cursor:pointer;" onclick="myFunction()">Signup now!!!</span></center>    

</form>





 <form class="login100-form validate-form signup" id="signup"  action="" method="post" > 
 <h2>Signup</h2>
<span style="color:red;"><?php echo $message; ?></span> 
<div  class="wrap-input100 validate-input m-b-23" data-validate="Username is required" >

<div class="form-group" >
    <!-- <label for="exampleFormControlSelect1" style="color:#FFFFFF">Type</label> -->
    <select class="form-control" id="typ" name="typ"  style="border-radius:8px 8px 8px 8px;border:1px solid rgb(114, 114, 114)">
    <option value="">Select Your Unit</option>
    <option value="Super Admin">Madurai</option>
      <option value="Center">Virudhunagar</option>
	  <option value="Parents">Tenkasi</option>
    
   
    </select>
  </div>
</div>
<div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">
  <!-- <label for="exampleFormControlSelect1" style="color:#ffffff">PF No</label> -->
<input class="input100" type="text" name="username" style="background-color:#FFFFFF" placeholder="PF Number">
</div>
<div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">
  <!-- <label for="exampleFormControlSelect1" style="color:#ffffff">PF No</label> -->
<input class="input100" type="text" name="username" style="background-color:#FFFFFF" placeholder="PF Number">
</div>
<div class="text-right p-t-8 p-b-31">

</div>

<div class="wrap-login100-form-btn">
<div class="login100-form-bgbtn"></div>
      <input type="submit" id="buttn" class="login100-form-btn" style="background-color: red !important;text-align: center; color:white;" name="submit" value="Login" />
</div>

<center style='color:gray;' > make  <span style="color:blue; cursor:pointer;" onclick="myFunction1()">Login now!!!</span></center>    

</form>
 
                    </div>
                    <div class="w3l_form align-self  im"style="
background-color: white ;opacity: 0.5;">
                        <div class="left_grid_info" >
                            <img src="dist/img/raillogo.webp" alt="" class="img-fluid img1" height="100%" width="100%">
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
      
    </section>



<div id="dropDownSelect1"></div>
<script>
function myFunction() {
   var element = document.getElementById("login");
   element.classList.toggle("mystyle");

var st=document.getElementById("signup");
st.style="  display:inline;";


}
function myFunction1() {

    location.reload();

}
</script>
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