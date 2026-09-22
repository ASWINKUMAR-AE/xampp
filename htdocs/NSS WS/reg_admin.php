<?php
session_start(); // Start the session at the very beginning

// Check if the user is logged in and has the role of super admin
if ($_SESSION['role'] !== 'super admin') {
    // If not, redirect to the login page or an error page
    header('Location: login_in.php');
    exit;
}
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
.tit {
  font-size: 36px;
  font-weight: bold;
  color: #fff;
  text-align: center;
  padding: 20px;
  background-color: #003135;
}

.content {

  background-color: #003135;
}

.box {
  background-color: #333;
 
  width: 100% !important;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
margin-top:300px !important;
}

.box-header {
  background-color: #333;
  padding: 10px;
  border-bottom: 1px solid #444;
}

.box-title {
  font-size: 24px;
  font-weight: bold;
  color: #fff;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
  color: #fff;
}

input[type="text"], input[type="email"], input[type="date"], select {
  width: 100%;
  height: 40px;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}



.required {
  color: red;
}

.grp {
  margin-top: 20px;
  text-align: right;
}

button[type="reset"], button[type="submit"] {
  width: 100px;
  height: 40px;
  padding: 10px;
  margin: 10px;
  border: none;
  border-radius: 5px;
  background-color: #4CAF50;
  color: #fff;
  cursor: pointer;
}

button[type="reset"]:hover, button[type="submit"]:hover {
  background-color: #3e8e41;
}

button[type="reset"] {
  background-color: #ccc;
  color: #333;
}

button[type="reset"]:hover {
  background-color: #aaa;
}

.footer {
  background-color: #003135;
  padding: 20px;
  text-align: center;
  color: #fff;
}
.form-horizontal {
  width: 50%;
  position: relative !important;
  left: 50% !important;
  transform: translateX(-50%);
  margin-top: 100px; /* adjust this value to move the form up or down */
}

.grp {
  margin-left: 0;
  display: flex;
  justify-content: flex-end;
}
.form-group {
  margin-bottom: 20px;
  display: flex;
  align-items: center;
}

.form-group label {
  text-align: left !important;
  padding-right: 15px;
  font-size: 14px;
  font-weight: bold;
  color: white;
  flex: 0 0 150px;
  margin: 0;
}

.form-group input[type="radio"] {
  float:left !important; 
}
.form-group {
  margin-bottom: 20px;
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

.form-group input[type="radio"] {
margin:10px;
}

.ra1 {
  display: flex;
  align-items: center;
}

.ra1 label {

}

/* Make the form responsive on small screens */
@media only screen and (max-width: 600px) {
  .box{margin-top:500px !important; }
 .form-horizontal {
    width: 90%;
    margin-top: 20px;
  }
  .form-group input[type="radio"] {
margin-left:-10px;
}
 .form-group {
    /* flex-direction: column;
    align-items: flex-start; */
  
  }
 .form-group label {
    width: 100% !important;
    padding-right: 0;
    margin-bottom: 10px;
  }
 .form-group input[type="text"],.form-group input[type="email"],.form-group input[type="date"],.form-group select {
    width: 100% !important;
  }

 .ra1 label {
  margin-top:10px;

  }
 .grp {
    flex-direction: column;
    align-items: center;
  }
 .grp button {
    width: 50%;
    margin-bottom: 10px;
    float: left;
  }
  #reset{width: 100%;}#send{width: 100%;}
  .tit{font-size:18px !important;padding-left:60px;}
  .tit img{width: 40px !important; height: 40px !important;}
  .box{overflow:hidden  !important;}
  .es{position: relative; left:-80px;font-size:10px !important;} .es2{position: relative; left:-140px; font-size:10px !important;}  .es4{position: relative; left:0px;font-size:10px !important;}.es3{font-size:10px !important;position: relative; left:-75px;}
  .es5{position: relative; left:-120px;font-size:10px !important;}.es-1{font-size:5px !important;}
.ra2{margin-left:-80px !important;}
#es{font-size:10px !important;}.ra3{margin-top:20px !important;}
}
@media only screen and (max-width: 350px) {.es{position: relative; left:-90px;font-size:10px !important;} .es2{position: relative; left:-170px; font-size:10px !important;}  .es4{position: relative; left:0px;font-size:12px !important;}.es3{font-size:12px !important;position: relative; left:-75px;}
  .es5{position: relative; left:-120px;font-size:12px !important;}.es-1{font-size:5px !important;}

.ra1{margin-left:-50px;}
#sidebar{margin-top:-10px !important;}
.text-success{margin-left:80px !important;}

}
.text-success{margin-left:80px !important;}

        /* .box {
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
        } */

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
<?php include 'header2.php'; ?>
    <?php include 'slide.php'; ?>
<center>
    <div style="margin-top: 120px; background:rgb(48, 47, 47);" class="content">
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
                    <input id="name" class="form-control" name="name" placeholder="Name" required="required" type="text">
                </div>
                <div class="form-group">
                    <label for="regno">Regno <span class="required">*</span></label>
                    <input id="regno" class="form-control" name="regno" placeholder="Register No" required="required" type="text">
                </div>

                <div class="form-group">
                    <label for="dat"> DOB <span class="required">*</span></label>
                    <input id="dat" class="form-control" name="dat" placeholder="DOB" required="required" type="date">
                </div>

                <div class="form-group">
                    <label for="typ">Type <span class="required">*</span></label>
                    <select name="typ" class="form-control" id="typ" disabled>
                        <option value="Center">Admin</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="mno">Mobile No <span class="required">*</span></label>
                    <input id="mno" class="form-control" name="mno" placeholder="Mobile No" required="required" type="text">
                </div>

                <div class="form-group">
                    <label for="email">Email <span class="required">*</span></label>
                    <input id="email" class="form-control" name="email" placeholder="Email" required="required" type="text">
                </div>

                <div class="form-group">
                    <label for="uname">Username <span class="required">*</span></label>
                    <input id="uname" class="form-control" name="uname" placeholder="Username" required="required" type="text">
                </div>


                <div class="form-group">
                    <label for="pword">Password <span class="required">*</span></label>
                    <input id="pword" class="form-control" name="pword" placeholder="Password" required="required" type="text">
                </div>

                <div class="form-group grp text-right">
    <button id="reset" type="reset" class="btn btn-primary" >Cancel</button>
    <button id="send" type="submit" name="submit" class="btn btn-danger" >Submit</button>
</div>
    </center>

            </form>
        </div>
    </div>

    <?php if (isset($_POST['submit'])) {
        include 'register.php';
        admin_reg();
    } ?>
</body>

</html>
