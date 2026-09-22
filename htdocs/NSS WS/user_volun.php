<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'volunteer') {
    header('Location: login_in.php');
    exit;
}

include 'register.php';
$user_data = already_check();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    if (!$user_data) {
        volun_profile_add();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">  <link rel="stylesheet" href="bootstrap.min.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'header.php' ?>
    <title>Volunteer Registration</title>
    <style>
    
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
margin-top:400px !important;
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
  .box{margin-top:500px !important;}
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
    width: 50%;
    padding-right: 0;
    margin-bottom: 10px;
  }
 .form-group input[type="text"],.form-group input[type="email"],.form-group input[type="date"],.form-group select {
    width: 50%;
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

}
  </style>
</head>

<body style="background-color: #003135;" class="col-12">
<?php include 'header2.php';?>
  <div> 
    <?php include 'slide.php'; ?>

    <div style="margin-top: 140px; background:rgb(48, 47, 47);" class="content">
        <hr style="color: white;">
        <div class="box " style="background-color: black">
            <div class="box-header">
                <h3 class="box-title" style="font-size: 35px !important; color:orange !important;">Volunteer Registration</h3>
            </div>

            <form id="signupform" method="post" action="" class="form-horizontal" role="form" enctype="multipart/form-data">
                <?php if ($user_data): ?>
                    <p style="color: rgb(11, 62, 202);margin-top:-10px; font-size: 24px;">You are already registered.<br> Please contact your NSS PO for any updates.</p>
                <?php endif; ?>

                <div class="form-group">
                    <label for="name">Name of the Volunteer <span class="required">*</span></label>
                    <input id="name" class="form-control" name="name" value="<?php echo isset($user_data['name']) ? $user_data['name'] : '' ?>" placeholder="Name" required="required" type="text" <?php echo $user_data ? 'readonly' : '' ?>>
                </div>
                <div class="form-group">
    <label for="gender">Gender <span class="required">*</span></label>
    <?php if ($user_data): ?>
        <input id="gender" class="form-control" name="gender" value="<?php echo isset($user_data['gender']) ? $user_data['gender'] : '' ?>" placeholder="Gender" required="required" type="text" readonly>
    <?php else: ?>
        <div class="ra1">
            <input type="radio" id="male" name="gender" value="Male" required  class="es-1">
            <label for="male" class="col-1" class="es-1" id="es" >Male</label>

            <input type="radio" id="female" name="gender" value="Female" class="es">
            <label for="female"  class="es">Female</label>
            
            <input type="radio" id="other" name="gender" value="Other" class="es2">
            <label for="other" class="es2">Other</label>
        </div>
    <?php endif; ?>
</div>

                <div class="form-group">
                    <label for="dob">Date of Birth <span class="required">*</span></label>
                    <input id="dob" class="form-control" name="dob" value="<?php echo isset($user_data['dob']) ? $user_data['dob'] : '' ?>" placeholder="DD/MM/YYYY" required="required" type="date" <?= $user_data ? 'readonly' : '' ?>>
                </div>
                <div class="form-group">
                    <label for="year">Year <span class="required">*</span></label>
                    <?php if ($user_data): ?>
                        <input id="year" class="form-control" name="year" value="<?= $user_data['year'] ?>" placeholder="Year" required="required" type="text" readonly>
                    <?php else: ?>
                        <div class="ra1 ra2">
                            <input type="radio" id="year1" name="year" value="First Year" required class="es-1">
                            <label for="year1"class="es4" style=""id="es">First Year &nbsp;</label>
                            <input type="radio" id="year2" name="year" value="Second Year" class="es" style="margin-left:5px; margin-right:-1px;">
                            <label for="year2" class="es">Second Year &nbsp;</label>
                            <input type="radio" id="year3" name="year" value="Third Year"  class="es2"  style="margin-left:5px; margin-right:-1px;">
                            <label for="year3"  class="es2">Third Year</label>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="subject">Branch of Study <span class="required">*</span></label>
                    <?php if ($user_data): ?>
                        <input id="subject" class="form-control" name="subject" value="<?= $user_data['subject'] ?>" placeholder="Branch of Study" required="required" type="text" readonly>
                    <?php else: ?>
                        <div class="ra1 ra3">
                            <input type="radio" id="subject1" name="subject" value="Science" required class="es-1">
                            <label for="subject1"id="es">Science</label>
                            <input type="radio" id="subject2" name="subject" value="Commerce"class="es">
                            <label for="subject2"class="es">Commerce</label>
                            <input type="radio" id="subject3" name="subject" value="Arts" class="es2">
                            <label for="subject3" class="es2">Arts</label>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="mno">Mobile No <span class="required">*</span></label>
                    <input id="mno" class="form-control" name="mno" value="<?php echo isset($user_data['mno']) ? $user_data['mno'] : '' ?>" placeholder="Mobile No" required="required" type="text" <?= $user_data ? 'readonly' : '' ?>>
                </div>
                <div class="form-group">
                    <label for="address">Address <span class="required">*</span></label>
                    <input id="address" class="form-control" name="address" value="<?php echo isset($user_data['address']) ? $user_data['address'] : '' ?>" placeholder="Address" required="required" type="text" <?= $user_data ? 'readonly' : '' ?>>
                </div>
                <div class="form-group">
                    <label for="email">Email ID <span class="required">*</span></label>
                    <input id="email" class="form-control" name="email" value="<?php echo isset($user_data['email']) ? $user_data['email'] : '' ?>" placeholder="Email" required="required" type="email" <?= $user_data ? 'readonly' : '' ?>>
                </div>
                <div class="form-group">
                    <label for="aadhaar">Aadhaar No <span class="required">*</span></label>
                    <input id="aadhaar" class="form-control" name="aadhaar" value="<?php echo isset($user_data['aadhaar']) ? $user_data['aadhaar'] : '' ?>" placeholder="Aadhaar No" required="required" type="text" <?= $user_data ? 'readonly' : '' ?>>
                </div>
                <div class="form-group">
                    <label for="community">Community <span class="required">*</span></label>
                    <?php if ($user_data): ?>
                        <input id="community" class="form-control" name="community" value="<?= $user_data['community'] ?>" placeholder="Community" required="required" type="text" readonly>
                    <?php else: ?>
                        <select id="community" class="form-control" name="community" required="required">
                            <option value="SC">SC</option>
                            <option value="ST">ST</option>
                            <option value="BC">BC</option>
                            <option value="OBC">OBC</option>
                            <option value="Others">Others</option>
                        </select>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="blood">Blood Group <span class="required">*</span></label>
                    <?php if ($user_data): ?>
                        <input id="blood" class="form-control" name="blood" value="<?= $user_data['blood'] ?>" placeholder="Blood Group" required="required" type="text" readonly>
                    <?php else: ?>
                        <select id="blood" class="form-control" name="blood" required="required">
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    <?php endif; ?>
                </div>

                <?php if (!$user_data): ?>
                 <center>   <div class="form-group grp text-right">
                        <button id="reset" type="reset" class="btn btn-primary">Cancel</button>
                        <button id="send" type="submit" name="submit" class="btn btn-danger">Submit</button>
                    </div></center>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <div class="footer"></div> 
</body>

</html>
