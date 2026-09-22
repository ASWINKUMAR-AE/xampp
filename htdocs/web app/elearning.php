<?php
session_start();
include("connection/config.php");

if (@$_GET['action'] == "edit" and isset($_GET['sno'])) {
    $c_id = $_GET['sno'];
    $school_details = jk_select_data(LEARNING, "where sno='$c_id'");
    extract($school_details[0]);
}

if (isset($_POST['btnUpdate'])) {
    $sno = $_POST['sno'];
    $datas = array_filter($_POST);
    $datas['date_of_create'] = jk_mysql_datetime();

    if (!empty($_FILES['img']['name'])) {
        $allowed_types = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];
        $file_type = $_FILES['img']['type'];

        if (in_array($file_type, $allowed_types)) {
            $imgname = basename($_FILES['img']['name']);
            $img = date('YmdHis') . '_' . $imgname;
            $img_path = 'upload/' . $img;

            if (move_uploaded_file($_FILES['img']['tmp_name'], $img_path)) {
                $datas['img'] = $img;
            } else {
                echo "<script>alert('Image upload failed. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('Invalid file type. Only JPG, JPEG, GIF, and PNG are allowed.');</script>";
        }
    }

    $insertRoute = jk_update_data(LEARNING, $datas, "sno", "$sno");

    if ($insertRoute) {
        echo "<script>alert('Record Edited Successfully!');window.location.href='Learningview.php';</script>";
    } else {
        $FormResponse = jk_form_error($insertRoute);
        extract($_POST);
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
                        <h3 class="box-title">Learning Master</h3>
                        <div class="text-right">
                            <a href="Learningview.php" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <form id="signupform" method="post" action="" class="form-horizontal" role="form" enctype="multipart/form-data">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sno">S.No <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="sno" class="form-control col-md-7 col-xs-12" value="<?php echo $sno; ?>" name="sno" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dat">Date <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="dat" class="form-control col-md-7 col-xs-12" value="<?php echo $dat; ?>" name="dat" required="required" type="date">
                            </div>
                        </div>
                        <div class="item form-group" style="display:none">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lname">Learning Name <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="lname" class="form-control col-md-7 col-xs-12" value="<?php echo $lname; ?>" name="lname" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subj">Topic <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="subj" value="<?php echo $subj; ?>" class="form-control col-md-7 col-xs-12" name="subj" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="img">File Upload <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="img" name="img" type="file">
                                <?php if (!empty($img)): ?>
                                    <img src="upload/<?php echo $img; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="reset" class="btn btn-primary">Cancel</button>
                                <button id="btnUpdate" type="submit" name="btnUpdate" class="btn btn-danger">Submit</button>
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
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 5.1.0
    </div>
    <strong>Copyright &copy; 2023.</strong> Rabbi Academy All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <ul class="control-sidebar-menu">
            <li>
                <a href="javascript:void(0)">
                    <h4 class="control-sidebar-subheading">
                        Custom Template Design
                        <span class="label label-danger pull-right">70%</span>
                    </h4>
                    <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                    </div>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <h4 class="control-sidebar-subheading">
                        Update Resume
                        <span class="label label-success pull-right">95%</span>
                    </h4>
                    <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                    </div>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <h4 class="control-sidebar-subheading">
                        Laravel Integration
                        <span class="label label-warning pull-right">50%</span>
                    </h4>
                    <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                    </div>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <h4 class="control-sidebar-subheading">
                        Back End Framework
                        <span class="label label-primary pull-right">68%</span>
                    </h4>
                    <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                    </div>
                </a>
            </li>
        </ul>
        <!-- /.control-sidebar-menu -->
    </div>
    <!-- /.tab-pane -->
    <!-- Stats tab content -->
    <!-- /.tab-pane -->
    <!-- Settings tab content -->
    <form method="post">
        <h3 class="control-sidebar-heading">General Settings</h3>
        <div class="form-group">
            <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
            </label>
            <p>
                Some information about this general settings option
            </p>
        </div>
        <!-- /.form-group -->
        <div class="form-group">
            <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
            </label>
            <p>
                Other sets of options are available
            </p>
        </div>
        <!-- /.form-group -->
        <div class="form-group">
            <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
            </label>
            <p>
                Allow the user to show his name in blog posts
            </p>
        </div>
        <!-- /.form-group -->
        <h3 class="control-sidebar-heading">Chat Settings</h3>
        <div class="form-group">
            <label class="control-sidebar-subheading">
                Show me as online
                <input type="checkbox" class="pull-right" checked>
            </label>
        </div>
        <!-- /.form-group -->
        <div class="form-group">
            <label class="control-sidebar-subheading">
                Turn off notifications
                <input type="checkbox" class="pull-right">
            </label>
        </div>
        <!-- /.form-group -->
        <div class="form-group">
            <label class="control-sidebar-subheading">
                Delete chat history
                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
        </div>
        <!-- /.form-group -->
    </form>
</div>
<!-- /.tab-pane -->
</div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - 'end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
