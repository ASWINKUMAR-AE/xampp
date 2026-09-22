<?php
session_start(); // Start the session at the very beginning

if ($_SESSION['role'] !== 'volunteer') {
    // If not, redirect to the login page or an error page
    header('Location: login_in.php');
    exit;
}

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
include 'db.php';

// Check if the user is logged in and has the role of volunteer
// Check if the user is logged in and has the role of super admin

include 'register.php';

$user_id=$_SESSION['usr_name'];
$query = "SELECT * FROM volunteers_profile WHERE user_id = $user_id";
$result = $conn->query($query);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'header.php' ?>
    <title>Volunteer Registration</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #003135;
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
            margin-top: 120px;
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
            color: white;
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

        .grp {
            margin-left: 230px;
        }

        @media (max-width: 768px) {
            .box {
                margin-top: 300px;
            }

            .grp {
                margin-left: 0px;
            }

            .grp button {
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
    <h1 class="tit" style="color:white; position:relative; text-align: center; padding-top: 15px; padding-bottom: 20px; background-color: #003135;">
        NSS - TNGPTC
    </h1>
    <?php include 'slide.php'; ?>

    <div style="margin-top: 120px; background-color:#003135;" class="content">
        <hr style="color: white;">
        <div class="box" style="background-color: black">
            <div class="box-header">
                <h3 class="box-title" style="color:rgb(155, 184, 184)">Volunteer Registration</h3>
            </div>

            <form id="signupform" method="post" action="" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name of the Volunteer <span class="required">*</span></label>
                    <input id="name" class="form-control" name="name" placeholder="Name" required="required" type="text">
                </div>
                <div class="form-group">
                    <label for="name">Gender <span class="required">*</span></label>
                    <input id="name" class="form-control" name="name" placeholder="Name" required="required" type="text">
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth <span class="required">*</span></label>
                    <input id="dob" class="form-control" name="dob" placeholder="DD/MM/YYYY" required="required" type="date">
                </div>
                <div class="form-group">
                    <label for="name"> Year <span class="required">*</span></label>
                    <input id="name" class="form-control" name="name" placeholder="" required="required" type="text">
                </div>
                <div class="form-group">
                    <label for="name">Branch <span class="required">*</span></label>
                    <input id="name" class="form-control" name="name" placeholder="Name" required="required" type="text">
                </div>
                <div class="form-group">
                    <label for="mno">Mobile No <span class="required">*</span></label>
                    <input id="mno" class="form-control" name="mno" placeholder="Mobile No" required="required" type="text">
                </div>
                <div class="form-group">
                    <label for="address">Address <span class="required">*</span></label>
                    <input id="address" class="form-control" name="address" placeholder="Address" required="required" type="text">
                </div>
                <div class="form-group">
                    <label for="email">Email ID <span class="required">*</span></label>
                    <input id="email" class="form-control" name="email" placeholder="Email" required="required" type="email">
                </div>
                <div class="form-group">
                    <label for="aadhaar">Aadhaar No <span class="required">*</span></label>
                    <input id="aadhaar" class="form-control" name="aadhaar" placeholder="Aadhaar No" required="required" type="text">
                </div>
                <div class="form-group">
                    <label for="name">Community <span class="required">*</span></label>
                    <input id="name" class="form-control" name="name" placeholder="Name" required="required" type="text">
                </div>
                <div class="form-group">
                    <label for="blood">Blood Group <span class="required">*</span></label>
                    <input id="blood" class="form-control" name="blood" placeholder="Blood Group" required="required" type="text">
                </div>

                <div class="form-group grp text-right">
                    <button id="reset" type="reset" class="btn btn-primary">Cancel</button>
                    <button id="send" type="submit" name="submit" class="btn btn-danger">Submit</button>
                </div>

            </form>
        </div>
    </div>

    <div class="footer"></div> 
</body>

</html>
