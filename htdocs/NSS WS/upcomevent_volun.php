<?php
// Assuming admin is logged in and their id is stored in $_SESSION['admin_id']
session_start();

// Check if the user is logged in and has the role of super admin
if ($_SESSION['role'] !== 'super admin') {
    // If not, redirect to the login page or an error page
    header('Location: login_in.php');
    exit;
}

include 'header.php';
if(isset($_POST['submit'])) {
    include 'register.php';
    upcoming_event_post();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Event</title>
    <link rel="stylesheet" href="event_post.css">
    <style>   
    
    
    
     @media (max-width: 570px) {
            .tit{font-size:25px !important;}
            .menu-btn{margin-top:px !important;}
            .container{
             
             overflow-x:hidden !important;
            }
            #sidebar{margin-top:-20px !important;}
    .text-success{margin-left:80px !important;}
        }
        .text-success{margin-left:80px !important;}
    </style>
</head>
<body style=" background:rgb(48, 47, 47);">
<?php include 'header2.php'; ?>
    <?php include 'slide.php'; ?>
    <div class="container" style="margin-top:-470px !important;">
        <a href="approve_event.php">Approve Volunteer Requests</a>
        <h2>Post Event</h2>
        <form method="post" action="">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title"><br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description"></textarea><br>
            <input type="submit" name="submit" value="Post Event">
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>

