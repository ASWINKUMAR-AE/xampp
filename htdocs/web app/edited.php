<?php
session_start();
?>

<?php include("connection/config.php");

if (@$_GET['action'] == "edit" and isset($_GET['c_id'])) {
    $c_id = $_GET['c_id'];
    $school_details = jk_select_data(GALLERY, "where c_id='$c_id'");
    extract($school_details[0]);
}

if (isset($_POST['btnUpdate'])) {
    $c_id = $_POST['c_id'];
    $datas = array_filter($_POST);

    if (!empty($_FILES['serviceimg']['name'])) {
        $allowed_types = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];
        $file_type = $_FILES['serviceimg']['type'];

        if (in_array($file_type, $allowed_types)) {
            $imgname = basename($_FILES['serviceimg']['name']);
            $img = date('YmdHis') . '_' . $imgname;
            $img_path = 'upload/' . $img;

            if (move_uploaded_file($_FILES['serviceimg']['tmp_name'], $img_path)) {
                $datas['serviceimg'] = $img;
            } else {
                echo "<script>alert('Image upload failed. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('Invalid file type. Only JPG, JPEG, GIF, and PNG are allowed.');</script>";
        }
    }

    $insertRoute = jk_update_data(GALLERY, $datas, "c_id", "$c_id");

    if ($insertRoute) {
        echo "<script>alert('Record Edited Successfully!');window.location.href='imgadd.php';</script>";
    } else {
        $FormResponse = jk_form_error($insertRoute);
        extract($_POST);
    }
}

?>
<?php include("header.php"); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include("slide1.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Gallery Master</h3>
                        <div class="text-right">
                            <a href="" class="btn btn-primary">Add Data </a>
                        </div>
                    </div>

                    <form id="signupform" method="post" action="" class="form-horizontal" role="form" enctype="multipart/form-data">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">SNo <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="c_id" value="<?php echo $c_id; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="c_id" placeholder="" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Type <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="type" value="<?php echo $type; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="type" placeholder="" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Image<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="serviceimg" name="serviceimg">
                                <?php if (!empty($serviceimg)): ?>
                                    <img src="upload/<?php echo $serviceimg; ?>" width="100px" height="100px" id="serviceimg" name="serviceimg" style="border:4px groove #CCCCCC; border-radius:5px;">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="reset" class="btn btn-primary">Cancel</button>
                                <button id="btnUpdate" name="btnUpdate" type="submit" onclick="" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                    </form>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("footer.php"); ?>
