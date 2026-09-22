<?php
session_start();
include("connection/config.php");

// Ensure session variable is set
if (!isset($_SESSION["SESS_LAST_NAMEE"])) {
    die("Session variable not set.");
}

// Fetch user data from database
$regno = $_SESSION["SESS_LAST_NAMEE"];
$query = "SELECT * FROM `register` WHERE regno = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("s", $regno);
$stmt->execute();
$result = $stmt->get_result();
$website_data = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regno = trim($_POST['regno']);
    $type = trim($_POST['type']);
    $name = trim($_POST['name']);
    $mno = trim($_POST['mno']);
    $email = trim($_POST['email']);
    $uname = trim($_POST['uname']);
    $pword = trim($_POST['pword']);

    $errorflag = 1;
    $logo = '';

    // Handle file upload
    if (!empty($_FILES['image']['name'])) {
        $allowed_types = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];
        $file_type = $_FILES['image']['type'];

        if (!in_array($file_type, $allowed_types)) {
            $errorflag = 0;
        } else {
            $logoname = basename($_FILES['image']['name']);
            $logo = date('YmdHis') . '_' . $logoname;
            $img_path = 'upload/' . $logo;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $img_path)) {
                $query = "UPDATE `register` SET img = ? WHERE id = ?";
                $stmt = $db->prepare($query);
                $stmt->bind_param("si", $logo, $website_data['id']);
                $stmt->execute();
            } else {
                $errorflag = 0;
            }
        }
    }

    if ($errorflag) {
        $query = "UPDATE `register` SET regno = ?, typ = ?, name = ?, mno = ?, email = ?, uname = ?, pword = ? WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("sssssssi", $regno, $type, $name, $mno, $email, $uname, $pword, $website_data['id']);

        if ($stmt->execute()) {
            $_SESSION['successmessage'] = 'Updated successfully.';
            header('Location: Profile.php?id=' . $website_data['id']);
            exit();
        } else {
            $_SESSION['errormessage'] = 'Please enter valid data...';
            header('Location: Profile.php?id=' . $website_data['id']);
            exit();
        }
    } else {
        $_SESSION['errormessage'] = 'Invalid file type or upload error.';
        header('Location: Profile.php?id=' . $website_data['id']);
        exit();
    }
}
?>
<?php include("header.php"); ?>
<?php include("slide.php"); ?>
<?php include("slide1.php"); ?>

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">My Profile</h3>
                        <div class="text-right">
                            <a href="master1.php" class="btn btn-primary">Back </a>
                        </div>
                    </div>

                    <!-- Display Success or Error Message -->
                    <?php
                    if (isset($_SESSION['successmessage'])) {
                        echo '<script>alert("' . $_SESSION['successmessage'] . '");</script>';
                        unset($_SESSION['successmessage']);
                    }
                    if (isset($_SESSION['errormessage'])) {
                        echo '<script>alert("' . $_SESSION['errormessage'] . '");</script>';
                        unset($_SESSION['errormessage']);
                    }
                    ?>

                    <form id="signupform" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="regno">Regno <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="regno" value="<?php echo htmlspecialchars($website_data['regno']); ?>" class="form-control col-md-7 col-xs-12" name="regno" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Type <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="type" value="<?php echo htmlspecialchars($website_data['typ']); ?>" class="form-control col-md-7 col-xs-12" name="type" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" value="<?php echo htmlspecialchars($website_data['name']); ?>" class="form-control col-md-7 col-xs-12" name="name" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mno">Mobile No <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="mno" value="<?php echo htmlspecialchars($website_data['mno']); ?>" class="form-control col-md-7 col-xs-12" name="mno" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="email" value="<?php echo htmlspecialchars($website_data['email']); ?>" class="form-control col-md-7 col-xs-12" name="email" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="uname">Username <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="uname" value="<?php echo htmlspecialchars($website_data['uname']); ?>" class="form-control col-md-7 col-xs-12" name="uname" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pword">Password <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="pword" value="<?php echo htmlspecialchars($website_data['pword']); ?>" class="form-control col-md-7 col-xs-12" name="pword" required="required" type="password">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Image<span class="required">*</span></label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <input type="file" id="image" class="form-control col-md-4 col-xs-4" name="image">
                                <img src="upload/<?php echo htmlspecialchars($website_data['img']); ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <input type="submit" id="send" class="btn btn-danger" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include("footer.php"); ?>
