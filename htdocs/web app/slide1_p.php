 <?php
 
$typ=$_SESSION['SESS_LAST_NAME'];


if($typ=='Super Admin') {
?> 
  
  <aside class="main-sidebar">
  
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
	
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
		
          <img src="dist/img/logo (2).png" class="img-circle" style="height: 50px !important;width: 100px !important;" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
        </div>
      </div>
    
    <ul class="sidebar-menu" data-widget="tree">
  
        <li><a href="master.php"><i class="fa-dashboard fa"></i> Dashboard</a></li>
				<li><a href="attt_view.php"><i class="fa fa-book"></i> <span>Attendance Report</span></a></li>
        <li><a href="attt_view.php"><i class="fa fa-book"></i> <span>Students Report</span></a></li>
				<li><a href="Learningview.php"><i class="fa fa-book"></i> <span>Learning Center</span></a></li>
        <li><a href="imgadd.php"><i class="fa fa-book"></i> <span>Gallery</span></a></li>
				<li><a href="noticeview.php"><i class="fa fa-book"></i> <span>Notices</span></a></li>
				<li><a href="helpdesk.php"><i class="fa fa-book"></i> <span>Help Desk</span></a></li>
				<li><a href="aboutus.php"><i class="fa fa-book"></i> <span>About Us </span></a></li>
				<li><a href="contactus.php"><i class="fa fa-book"></i> <span>Contact Us</span></a></li>
				<li><a href="https://www.rabbiglobalacademy.com/"><i class="fa fa-book"></i> <span>My Profile</span></a></li>
		    <li><a href="index.php"><i class="fa-dashboard fa"></i> Logout</a></li>

      </ul>
	  
    </section>
    <!-- /.sidebar -->
  </aside>
  <?php
}
if($typ=='Center') {
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Center</p>
          <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
        </div>
      </div>
    
     <ul class="sidebar-menu" data-widget="tree">
     
           
         <li><a href="master1.php"><i class="fa-dashboard fa"></i> Dashboard</a></li>


        <li><a href="centreview.php"><i class="fa fa-book"></i> <span>CentreName</span></a></li>
		  <li><a href="tstudentlist.php"><i class="fa fa-book"></i> <span>Student List</span></a></li>

		        <li><a href="attt.php"><i class="fa fa-book"></i> <span>Attedence</span></a></li>
				<li><a href="studentreportc.php"><i class="fa fa-book"></i> <span>StudentReport</span></a></li>
				<li><a href="tLearningview.php"><i class="fa fa-book"></i> <span>Learning Center</span></a></li>
				<li><a href="tnoticeview.php"><i class="fa fa-book"></i> <span>Notice</span></a></li>
				<li><a href="timgadd.php"><i class="fa fa-book"></i> <span>Gallery</span></a></li>
	
			
				
				<li><a href="Profile.php"><i class="fa fa-book"></i> <span>My Profile </span></li></a>
				
				
		   <li><a href="index.php"><i class="fa-dashboard fa"></i> Logout</a></li>
      </ul>
	  
    </section>
    <!-- /.sidebar -->
  </aside>
  
  <?php } ?>
  <?php
$typ=$_SESSION['SESS_LAST_NAME'];

if($typ=='Parents') {
?>

 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Parent's</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    
    <ul class="sidebar-menu" data-widget="tree">
     
           
         <li><a href="master2.php"><i class="fa-dashboard fa"></i> Dashboard</a></li>


        <li><a href="parentatten.php"><i class="fa fa-book"></i> <span>Attedance Report</span></a></li>
		  <li><a href="pstudentmasterreport.php"><i class="fa fa-book"></i> <span>Student Report</span></a></li>

		        <li><a href="pLearningview.php"><i class="fa fa-book"></i> <span>LearningCenter</span></a></li>
				<li><a href="imgaddp.php"><i class="fa fa-book"></i> <span>Gallery</span></a></li>
				<li><a href="pnoticeview.php"><i class="fa fa-book"></i> <span>Notices</span></a></li>
			
				<li><a href="phelpdesk.php"><i class="fa fa-book"></i> <span>Helpdesk</span></a></li>
				<li><a href="paboutus.php"><i class="fa fa-book"></i> <span>AboutUs</span></a></li>
				<li><a href="pcontactus.php"><i class="fa fa-book"></i> <span>ContactUs</span></a></li>
				<li><a href="https://www.rabbiglobalacademy.com/"><i class="fa fa-book"></i> <span>Website</span></a></li>
				<li><a href="Profilep.php"><i class="fa fa-book"></i> <span>Myprofile </span></a></li>
				 <li><a href="index.php"><i class="fa-dashboard fa"></i> Logout</a></li>
      </ul>
	  
    </section>
    <!-- /.sidebar -->
  </aside>


<?php
}

 