<?php
session_start(); // Start the session at the very beginning

// Check if the user is logged in and has the role of super admin
if ($_SESSION['role'] !== 'super admin') {
    // If not, redirect to the login page or an error page
    header('Location: login_in.php');
    exit;
}
include 'register.php';
include 'db.php';
$edit_id=$_SESSION['edit_id'];
$query = "SELECT * FROM admin WHERE id = $edit_id";
$result = $conn->query($query);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'header.php' ?>
    <title>Admin Register</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #003135;;
            margin: 0;
            padding: 0;
        }

        .box {
            background-color: #ffffff;
            border-radius: 8px;
            border: 1px solid white;
            box-shadow: 0px 0px 5px 3px rgba(125, 148, 189, 1);
            padding: 20px;
            margin: 20px;
        }

        .box-header {
            border-bottom: 2px solid #e5e5e5;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }

        .box-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .text-right {
            text-align: right;
        }

        .text-right .btn {
            margin-left: 10px;
        }

        .form-horizontal {
            width: 50%;
            position: relative;
            left: 300px;
        }

        .form-group {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .form-group label {
            text-align: right;
            padding-right: 15px;
            font-size: 14px;
            font-weight: bold;
            color: #555;
            flex: 0 0 150px;
            margin: 0;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: none;
            height: 40px;
            font-size: 14px;
            padding: 10px;
            flex: 1;
            margin-left: 15px;
        }

        .btn-primary,
        .btn-danger {
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: bold;
            color: #fff;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-primary:hover,
        .btn-danger:hover {
            opacity: 0.9;
        }
        .grp{
            margin-left: 230px;
        }

        @media (max-width: 768px) {
            div .box{
                margin-top: 300px;
            }
            .grp{
                margin-left: 0px;
            }

            .grp button{
                margin-bottom: 5px;
            }
            .form-horizontal .form-group label {
                text-align: left;
                padding-right: 0;
                margin-bottom: 5px;
                flex: 1;
            }

            .form-horizontal .form-group {
                flex-direction: column;
                align-items: flex-start;
            }

            .form-horizontal {
                left: 50px;
            }

            .form-horizontal .form-group .col-md-6 {
                padding: 0;
            }

            .form-control {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>

<body style="background-color: #003135;">
<h1 class="tit"
        style="color:white; position:relative; text-align: center; padding-top: 15px; padding-bottom: 20px; background-color: #003135;">
        NSS - TNGPTC</h1>
    <?php include 'slide.php'; ?>

    <div style="margin-top: 120px; background-color:#003135;" class="content">
        <hr style="color: white;">
        <div class="box" style="background-color: black">
            <div class="box-header">
                <h3 class="box-title" style="color:rgb(155, 184, 184)">Admin Register</h3>
                <div class="text-right">
                    <a href="admin_view.php" class="btn btn-primary">User View</a>
                </div>
            </div>

            <form id="signupform" method="post" action="" class="form-horizontal" role="form" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="name">Name <span class="required">*</span></label>
                    <input id="name" class="form-control" name="name" placeholder="Name" value="<?php echo $row['name']?> " required="required" type="text">
                </div>
                <div class="form-group">
                    <label for="regno">Regno <span class="required">*</span></label>
                    <input id="regno" value="<?php echo $row['reg_no']?>" class="form-control" name="regno" placeholder="Register No" required="required" type="text">
                </div>

                <div class="form-group">
                    <label for="dat"> DOB <span class="required">*</span></label>
                    <input id="dat" value="<?php echo $row['DOB']?>" class="form-control" name="dat" placeholder="DOB" required="required" type="date">
                </div>

                <div class="form-group">
                    <label for="typ">Type <span class="required">*</span></label>
                    <select name="typ" class="form-control" id="typ" disabled>
                        <option value="Center">Admin</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="mno">Mobile No <span class="required">*</span></label>
                    <input id="mno" value="<?php echo $row['Mobile_Number']?>" class="form-control" name="mno" placeholder="Mobile No" required="required" type="text">
                </div>

                <div class="form-group">
                    <label for="email">Email <span class="required">*</span></label>
                    <input id="email" value="<?php echo $row['email']?>" class="form-control" name="email" placeholder="Email" required="required" type="text">
                </div>
                <?php

$decryptedPassword = decrypt_aes($row['password'], ENCRYPTION_KEY); ?>
                <div class="form-group">
                    <label for="uname">Username <span class="required">*</span></label>
                    <input id="uname" value="<?php echo $row['username']?>" class="form-control" name="uname" placeholder="Username" required="required" type="text">
                </div>

                <div class="form-group">
                    <label for="pword">Password <span class="required">*</span></label>
                    <input id="pword" value="<?php echo $decryptedPassword?>" class="form-control" name="pword" placeholder="Password" required="required" type="text">
                </div>

                <div class="form-group grp text-right">
    <button id="reset" type="reset" class="btn btn-primary" >Cancel</button>
    <button id="send" type="submit" name="edit" class="btn btn-danger" >Edit</button>
</div>

            </form>
        </div>
    </div>

    <?php if (isset($_POST['edit'])) {
        $regtoedit=$row['reg_no'];
        edit_admin();
    } ?>
</body>

</html>
