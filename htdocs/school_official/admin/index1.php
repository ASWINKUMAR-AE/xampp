<?php 
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Southern Railway Women’s Welfare Organization</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>

<style>
.blink_text {
-webkit-animation-name: blinker;
-webkit-animation-duration: 1s;
-webkit-animation-timing-function: linear;
-webkit-animation-iteration-count: infinite;

-moz-animation-name: blinker;
-moz-animation-duration: 1s;
-moz-animation-timing-function: linear;
-moz-animation-iteration-count: infinite;

 animation-name: blinker;
 animation-duration: 1s;
 animation-timing-function: linear;
 animation-iteration-count: infinite;

 color:white;
 font-size:16px;
}

@-moz-keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }

@-webkit-keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }

@keyframes blinker {  
 0% { opacity: 1.0; }
 50% { opacity: 0.0; }
 100% { opacity: 1.0; }
 }
</style>
</head>

<body style="background:#F7F7F7;">
    
    <div class="">

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <form action="" method="post">
                        <h1>SRWWO ADMIN CONTROL  </h1>
                        <div>
                            <input type="text" class="form-control" name="name" placeholder="Username" autofocus='autofocus' required />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="pass" placeholder="Password" required />
                        </div>
                        <div>
								<button class="btn btn-primary submit" type="submit" name="login"><i class="fa fa-check"></i> Log in</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
						
                            <div class="clearfix"></div>
                        </div>
                    </form>
<?php
include('dbcon.php');

if (isset($_POST['login'])){

$name=$_POST['name'];
$pass=$_POST['pass'];
// admin
$login_query=mysql_query("select * from admin where name='$name' and password='$pass'");
$count=mysql_num_rows($login_query);
   
$row=mysql_fetch_array($login_query);

if ($count > 0){
session_start();
$_SESSION['email']=$row['email'];

echo "<script>window.location='home.php'</script>";
}else{ ?>
<div class="alert alert-danger"><h3 class="blink_text">Access Denied</h3></div>		
<?php
}
}
?>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>
    </div>

</body>

</html>