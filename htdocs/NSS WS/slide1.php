<?php
//session_start();
$role = isset($_SESSION['role']) ? $_SESSION['role'] : null; // Check if the session variable 'role' is set

?>
<?php if ($role == "super admin") { ?>

    <style>.close-btn{background-color: rgb(32, 32, 32) !important;}
    .user-panel{background-color: rgb(39, 38, 38) !important;}
    .dp{border-radius:; border:none;max-width: 30%;}
    .pull-left .text-success{font-size: 15px; margin-left:5px;color:orange !important;}
    .fa-circle{margin-left:10px;}
    .list-items{background-color: rgb(32, 32, 32) !;}
    li a{color:white !important;}
    li i{color:orange !important;}
</style>
    <div class="wrapper" style="margin-top: -88px;">
        <input type="checkbox" id="btn" hidden>
        <label for="btn" class="menu-btn">
            <i class="fa fa-bars"></i>
        </label>
        <nav id="sidebar">
            <label for="btn" class="close-btn" style="background-color: rgb(32, 32, 32) !important;">
                <i class="fa fa-times"></i>
            </label>
            <div class="user-panel" style="background-color: rgb(39, 38, 38) !important;">
                <div class="pull-left image">
                   <button class="img-circle mt-1 dp" style="border-radius:; border:none;max-width: 30%;"> <img src="img/dp.png"  style="height: 50px !important;width: 50px !important;margin-top:5px; border-radius:50%; margin-left:10px;" alt="User Image"> </button>
                </div>
                <div class="pull-left info mt-1">
                    <h2 class="text-success" style="font-size: 15px; margin-left:5px;color:orange !important;">Super Admin</h2>
                    <i class="fa fa-circle text-success " style="margin-left:10px;" ></i> Online
                </div>
            </div>
            <div class="title" style="background-color: white ;"> .</div>
            <ul class="list-items" style="background-color: rgb(32, 32, 32);">
                <li><a href="dash_volun.php"><i class="fa fa-home" style="color:orange;"></i>Home</a></li>
                <li><a href="reg_admin.php"><i class="fa fa-sliders"style="color:orange;"></i>Register Admin</a></li>
                <li><a href="volun_view.php"><i class="fa fa-file"style="color:orange;"></i> Volunteers </a></li>
                <li><a href="upcomevent_volun.php"><i class="fa fa-cog"style="color:orange;"></i> Event Volunteers </a></li>
                <li><a href="#"><i class="fa fa-refresh"style="color:orange;"></i> Features </a></li>
                <li><a href="#"><i class="fa fa-user"style="color:orange;"></i>About us</a></li>
                <li><a href="#"><i class="fa fa-globe"style="color:orange;"></i>Languages</a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"style="color:orange;"></i>Log Out</a></li>
                <!--div class="icons">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-github"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div-->
            </ul>
        </nav>
    </div>
<?php 
} 
elseif ($role == "admin"){ ?>
     <style>.close-btn{background-color: rgb(32, 32, 32) !important;}
    .user-panel{background-color: rgb(39, 38, 38) !important;}
    .dp{border-radius:; border:none;max-width: 30%;}
    .pull-left .text-success{font-size: 15px; margin-left:5px;color:orange !important;}
    .fa-circle{margin-left:10px;}
    .list-items{background-color: rgb(32, 32, 32) !important;}
    li a{color:white !important;}
    li i{color:orange !important;}
</style>
    <div class="wrapper" style="margin-top: -88px;">
        <input type="checkbox" id="btn" hidden>
        <label for="btn" class="menu-btn">
            <i class="fa fa-bars"></i>
        </label>
        <nav id="sidebar">
            <label for="btn" class="close-btn">
                <i class="fa fa-times"></i>
            </label>
            <div class="user-panel" style="background-color: #000000 !important;">
                <div class="pull-left image">
                    <img src="img/dp.jpg" class="img-circle mt-1" style="height: 50px !important;width: 100px !important;border-radius: 50%;max-width: 50%;margin-left: 10px;" alt="User Image">
                </div>
                <div class="pull-left info mt-1">
                    <h2 class="text-success" style="font-size: 15px;">Volunteer</h2>
                    <i class="fa fa-circle text-success"></i>Online
                </div>
            </div>
            <div class="title" style="background-color: white "> .</div>
            <ul class="list-items">
                <li><a href="dash_volun.php"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="user_volun.php"><i class="fa fa-sliders"></i>My Profile</a></li>
                <li><a href="addvolun.php"><i class="fa fa-file"></i>Add Volunteer</a></li>
                <li><a href="att.php"><i class="fa fa-cog"></i>Attendance</a></li>
                <li><a href="#"><i class="fa fa-refresh"></i>Features</a></li>
                <li><a href="#"><i class="fa fa-user"></i>About us</a></li>
                <li><a href="#"><i class="fa fa-globe"></i>Languages</a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i>Log Out</a></li>
                <!--div class="icons">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-github"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div-->
            </ul>

        </nav>
    </div>
<?php 
}
elseif ($role == "volunteer") { ?>
     <style>.close-btn{background-color: rgb(32, 32, 32) !important;}
    .user-panel{background-color: rgb(39, 38, 38) !important;}
    .dp{border-radius:; border:none;max-width: 30%;}
    .pull-left .text-success{font-size: 15px; margin-left:5px;color:orange !important;}
    .fa-circle{margin-left:10px;}
    .list-items{background-color: rgb(32, 32, 32) !important;}
    li a{color:white !important;}
    li i{color:orange !important;}
</style>
    <div class="wrapper" style="margin-top: -88px;">
        <input type="checkbox" id="btn" hidden>
        <label for="btn" class="menu-btn">
            <i class="fa fa-bars"></i>
        </label>
        <nav id="sidebar">
            <label for="btn" class="close-btn">
                <i class="fa fa-times"></i>
            </label>
            <div class="user-panel" style="background-color: #000000 !important;">
                <div class="pull-left image">
                    <img src="img/nss.png" class="img-circle mt-1" style="height: 50px !important;width: 100px !important;border-radius: 50%;max-width: 50%;margin-left: 10px;" alt="User Image">
                </div>
                <div class="pull-left info mt-1">
                    <h2 class="text-success" style="font-size: 15px;">Volunteer</h2>
                    <i class="fa fa-circle text-success"></i>Online
                </div>
            </div>
            <div class="title" style="background-color: white "> .</div>
            <ul class="list-items">
                <li><a href="dash_volun.php"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="user_volun.php"><i class="fa fa-sliders"></i>My Profile</a></li>
                <li><a href="volun_view_post.php"><i class="fa fa-file"></i> Upcoming Volunteer Events </a></li>
                <li><a href="#"><i class="fa fa-cog"></i>Settings</a></li>
                <li><a href="#"><i class="fa fa-refresh"></i>Features</a></li>
                <li><a href="#"><i class="fa fa-user"></i>About us</a></li>
                <li><a href="#"><i class="fa fa-globe"></i>Languages</a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i>Log Out</a></li>
                <!--div class="icons">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-github"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div-->
            </ul>

        </nav>
    </div>
<?php } ?>
