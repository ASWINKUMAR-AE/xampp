<?php 
session_start();
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

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
 


    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
	  <link href="build/css/custom.css" rel="stylesheet">
	 <link href="build/css/font-awesome.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"> <span style="font-weight:800; margin-left:10px;">SRWWO</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/logo.png" alt="..."   class="img-circle profile_img">
              </div>
              <div class="profile_info">
                
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">
                  <li><a href="home.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a></li>
                  <li><a href="members.php"><i class="fa fa-users"></i> Member Details <span class="fa fa-chevron-down"></span></a></li>
                    <li><a href="events.php"><i class="fa fa-users"></i> Event Details <span class="fa fa-chevron-down"></span></a></li>
					<li><a href="register.php"><i class="fa fa-plus"></i> Add Admin <span class="fa fa-chevron-down"></span></a></li> 
					<li><a href="adss.php"><i class="fa fa-facebook"></i> Ad Details <span class="fa fa-chevron-down"></span></a></li> 
					 <li><a href="texts.php"><i class="fa fa-users"></i> Sliding Text <span class="fa fa-chevron-down"></span></a></li>
                  <li><a href="gallery_category.php"><i class="fa fa-users"></i> Gallery Category Add<span class="fa fa-chevron-down"></span></a></li>
					 			 <li><a href="slider.php"><i class="fa fa-users"></i> Gallery Add<span class="fa fa-chevron-down"></span></a></li>
				          <!--    <li><a href="userprofile.php"><i class="fa fa-edit"></i>Booking Details <span class="fa fa-chevron-down"></span></a></li>
                  
                   <li><a href="packages.php"><i class="fa fa-bar-chart-o"></i> Packages <span class="fa fa-chevron-down"></span></a></li> -->
                  <li><a href="feedback.php"><i class="fa fa-bar-chart-o"></i> Contact Details <span class="fa fa-chevron-down"></span></a></li>
				      <li><a href="student.php"><i class="fa fa-bar-chart-o"></i> Student Course Booking<span class="fa fa-chevron-down"></span></a></li>
                         <li><a href="index.php"><i class="fa fa-bar-chart-o"></i>Logout <span class="fa fa-chevron-down"></span></a></li>
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                     <?php echo $_SESSION['email'];  ?> 
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                 <!--   <li><a href="javascript:;"> Profile</a></li> -->
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->