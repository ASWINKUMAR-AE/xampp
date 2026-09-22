<?php
session_start();
?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include("header.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <style type="text/css">
<!--
.style1 {
	color: #652D90;
	font-weight: bold;
}
-->
 #hvb 
 {
	box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
 }
  </style>
  
  <div class="content-wrapper" style="background-color:#FFFFFF">
    <!-- Content Header (Page header) -->
   <div  align="center">
     <p><img src="dist/img/logo.png" /></p>
     <h2 class="style1">Rabbi Global Academy </h2>
   </div>

    <!-- Main content -->
    <section class="content" >
      <!-- Small boxes (Stat box) -->
      <div class="row" >
       
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="font-size:14px" style="background-color:#ffffff" id="hvb">
            <div class="inner" align="center">
              
 <i class="fa fa-user" style="font-size:40px;color:#F806E9"   aria-hidden="true"></i>
             <a href="centreview.php"class="small-box-footer">  <p style="color:#84288B"><strong> Center name</strong></p></a>
			 
            </div>
           
          </div>
        </div>
	
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color:#ffffff" id="hvb">
            <div class="inner"align="center">
              <i class="fa fa-file" style="font-size:40px;color:#6165D1  "  aria-hidden="true"></i>
    
              <a href="tstudentlist.php"class="small-box-footer"> <p style="color:#84288B"><strong> students List </strong></p></a>
			 
            </div>
         
          </div>
        </div>

		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box"style="background-color:#ffffff" id="hvb" >
            <div class="inner" align="center">
              <i class="fa fa-database" style="font-size:40px;color:#9561D1"  aria-hidden="true"></i>

            <a href="attt.php"class="small-box-footer">  <p style="color:#84288B"><strong>Attendance</strong></p></a>
			  
            </div>
          
          </div>
        </div>
		</a>
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color:#ffffff" id="hvb">
            <div class="inner" align="center">
			<i class="fa fa-file" style="font-size:40px;color:#F8068D"  aria-hidden="true"></i>
               <a href="studentreport.php"class="small-box-footer"> <p style="color:#84288B"><strong>Student Report</strong></p></a>
			  
            </div>
           
          </div>
        </div>
		</a>
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color:#ffffff" id="hvb">
            <div class="inner" align="center">
              
<i class="fa fa-desktop" style="font-size:40px;color:#2EB3F0" aria-hidden="true"></i>
           <a href="tLearningview.php"class="small-box-footer">   <p style="color:#84288B"><strong>Learning Center</strong></p></a>
			  
            </div>
          </div>
        </div>
		</a>
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color:#ffffff" id="hvb">
            <div class="inner" align="center">
              
<i class="fa fa-newspaper-o" style="font-size:40px;color:#155674"  aria-hidden="true"></i>
              <a href="tnoticeview.php"class="small-box-footer"><p style="color:#84288B"><strong>Notices</strong></p></a>
			  
            </div>
          
          </div>
        </div>
		</a>
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color:#ffffff" id="hvb">
            <div class="inner"align="center">
              
<i class="fa fa-image" style="font-size:40px;color:#3F3E7A"  aria-hidden="true"></i>
              <a href="timgadd.php"class="small-box-footer"> <p style="color:#84288B"><strong>Gallery</strong></p></a>
			 
            </div>
         
          </div>
        </div>
		</a>
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color:#ffffff" id="hvb">
            <div class="inner"align="center">
              
<i class="fa fa-user" style="font-size:40px;color:#D08387"  aria-hidden="true"></i>
               <a href="Profile.php" class="small-box-footer"> <p style="color:#84288B"><strong>My Profile</strong></p></a>
			
            </div>
         
          </div>
        </div>
		</a>
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box " style="background-color:#ffffff" id="hvb">
            <div class="inner"align="center">
              
<i class="fa fa-home" style="font-size:40px;color:#000080"  aria-hidden="true"></i>
              <a href="index.php"class="small-box-footer"><p style="color:#84288B"><strong>Logout</strong></p></a>
			  
            </div>
     
          </div>
        </div>
		</a>
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