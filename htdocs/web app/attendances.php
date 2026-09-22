<?php
session_start();
?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include("header.php"); ?>
<?php include("slide.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Attendance
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6" style="background-color:#0000FF">
          <!-- small box -->
          <div class="small-box bg-aqua" >
            <div class="inner" style="background-color:#0000FF">
              

              <p>Holiday</p>
            </div>
           <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right">More Information</i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6" style="background-color:#99CC00">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner" style="background-color:#99CC00">
              

              <p>Present</p>
            </div>
           
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right">More Information</i></a>
          </div>
        </div>
		
		<div class="col-lg-3 col-xs-6" style="background-color:red" >
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner" style="background-color:red">
              

              <p>Absent</p>
            </div>
           
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"> More Information</i></a>
          </div>
        </div>
		
		<div class="col-lg-3 col-xs-6" style="background-color:violet">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner" style="background-color:violet">
              

              <p>Late</p>
            </div>
           
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"> More Information</i></a>
          </div>
        </div>
		
		<div class="col-lg-3 col-xs-6" style="background-color:orange">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner" style="background-color:orange">
              

              <p>Half Day</p>
            </div>
           
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right">More Information</i></a>
          </div>
        </div>
		
		<div class="col-lg-3 col-xs-6" style="background-color:grey">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner" style="background-color:grey">
              

              <p>No Class</p>
            </div>
           
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right">More Information</i></a>
          </div>
        </div>
        <!-- ./col -->
       
        <!-- ./col -->
      
        <!-- ./col -->
      </div>
      <!-- /.row -->
    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include("footer.php"); ?>