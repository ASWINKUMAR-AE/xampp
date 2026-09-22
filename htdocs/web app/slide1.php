 <?php
 
$typ=$_SESSION['SESS_LAST_NAME'];
?>
<style> 
.logo-sl{
  position: relative;
  right: 10px;
  left: -10px;
  margin-left: 15px;
}
.fa-dashboard{
  font-size: 30px !important; 
}
.fa-book{
  font-size: 30px;
}
.user-panel{
  background-color: #4a0454;
  margin-top: -50px;
}
</style> <?php

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
  
        <li><a href="master.php"><i class="fa-dashboard fa logo-sm"></i> <span style="position:relative !important; left: 10px;" > Dashboard </span></a></li>
		    <li><a href="tutorview.php"><i class="logo-sl"> <img width="20" height="20" src="https://img.icons8.com/ios/50/FFFFFF/student-center.png" alt="student-center"/> </i> <span>Center</span></a></li>
		    <li><a href="studentview.php"><i class="logo-sl"> <img width="20" width="20" src="https://img.icons8.com/fluency-systems-regular/48/FFFFFF/log.png" alt="log"/> </i> <span>Students Master</span></a></li>
				<li><a href="attt_view.php"><i class="logo-sl"> <img width="20" height="20" src="https://img.icons8.com/sf-black/64/FFFFFF/checked-user-male.png" alt="checked-user-male"/> </i> <span>Attendance Report</span></a></li>
				<li><a href="Learningview.php"><i class="logo-sl"> <img width="20" width="20" src="https://img.icons8.com/external-basicons-solid-edtgraphics/50/FFFFFF/external-Teacher-teachers-basicons-solid-edtgraphics-17.png" alt="external-Teacher-teachers-basicons-solid-edtgraphics-17"/> </i> <span>Learning Center</span></a></li>
				<li><a href="studentmasterreport.php"><i class="logo-sl"> <img width="20" width="20" src="https://img.icons8.com/ios-glyphs/30/FFFFFF/statistics-report.png" alt="statistics-report"/> </i> <span>Student Report</span></a></li>
				<li><a href="imgadd.php"><i class="logo-sl"> <img width="20" width="20" src="https://img.icons8.com/glyph-neue/64/FFFFFF/gallery.png" alt="gallery"/> </i> <span>Gallery</span></a></li>
				<li><a href="noticeview.php"><i class="logo-sl"> <img width="20" width="20" src="https://img.icons8.com/ios-filled/50/FFFFFF/break--v1.png" alt="break--v1"/> </i> <span>Notices</span></a></li>
				<li><a href="helpdesk.php"><i class="logo-sl"> <img width="20" width="20" src="https://img.icons8.com/ios-filled/50/FFFFFF/online-support.png" alt="online-support"/> </i> <span>Help Desk</span></a></li>
				<li><a href="aboutus.php"><i class="logo-sl">  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 64 64" style="fill:#FFFFFF; position: relative; top: 6px;"> <path d="M 9 10 C 6.791 10 5 11.791 5 14 L 5 48 C 5 50.209 6.791 52 9 52 L 35.789062 52 L 35 62 L 46.865234 52 L 55 52 C 57.209 52 59 50.209 59 48 L 59 14 C 59 11.791 57.209 10 55 10 L 9 10 z M 32 17 C 34.209 17 36 18.791 36 21 C 36 23.209 34.209 25 32 25 C 29.791 25 28 23.209 28 21 C 28 18.791 29.791 17 32 17 z M 31 29 L 35 29 L 35 43 L 29 43 L 29 31 L 31 29 z"></path> </svg> </i> <span>About Us </span></a></li>
				<li><a href="contactus.php"><i class="logo-sl"> <img width="22" height="22" src="https://img.icons8.com/windows/32/FFFFFF/business-contact.png" alt="business-contact"/> </i> <span>Contact Us</span></a></li>
				<li><a href="Userprofile.php"><i class="logo-sl"> <img width="24" height="24" src="https://img.icons8.com/material-sharp/24/FFFFFF/user.png" alt="user"/> </i> <span>User Register</span></a></li>
        <li><a href="upload.php"><i class="logo-sl"> <img width="20" width="20" src="https://img.icons8.com/sf-regular-filled/48/FFFFFF/import.png" alt="import"/> </i> <span>Import to CSV</span></a></li>
				<li><a href="https://www.rabbiglobalacademy.com/"><i class="logo-sl"> <img width="20" height="20" src="https://img.icons8.com/ios-filled/50/FFFFFF/domain.png" alt="domain"/> </i> <span>Website</span></a></li>
		    <li><a href="index.php"><i class="fa-dashboard fa logo"></i> <span style="position:relative !important; left: 10px;" > Logout </span></a></li>

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
        <img src="dist/img/logo (2).png" class="img-circle" style="height: 50px !important;width: 100px !important;" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Center</p>
          <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
        </div>
      </div>
    
     <ul class="sidebar-menu" data-widget="tree">
     
           
         <li><a href="master1.php"><i class="fa-dashboard fa logo-sl"></i> <span style="position:relative !important; left: 10px;" > Dashboard </span></a></li>
         <li><a href="centreview.php"><i class="logo-sl"> <img width="20" height="20" src="https://img.icons8.com/ios/50/FFFFFF/student-center.png" alt="student-center"/> </i> <span>Center</span></a></li>
		     <li><a href="tstudentlist.php"><i class="fa fa-book logo-sl"></i> <span style="position: relative; left: 10px;">Student List</span></a></li>
		     <li><a href="attt.php"><i class="logo-sl"> <img width="20" height="20" src="https://img.icons8.com/sf-black/64/FFFFFF/checked-user-male.png" alt="checked-user-male"/> </i> <span>Attedence</span></a></li>
				 <li><a href="studentreport.php"> <i class="logo-sl"> <img width="20" height="20" src="https://img.icons8.com/ios-glyphs/30/FFFFFF/statistics-report.png" alt="statistics-report"/> </i> <span>StudentReport</span></a></li>
				 <li><a href="tLearningview.php"><i class="logo-sl"> <img width="20" height="20" src="https://img.icons8.com/external-basicons-solid-edtgraphics/50/FFFFFF/external-Teacher-teachers-basicons-solid-edtgraphics-17.png" alt="external-Teacher-teachers-basicons-solid-edtgraphics-17"/> </i> <span>Learning Center</span></a></li>
				 <li><a href="tnoticeview.php"> <i class="logo-sl"> <img width="20" height="20" src="https://img.icons8.com/ios-filled/50/FFFFFF/break--v1.png" alt="break--v1"/> </i> <span>Notice</span></a></li>
				 <li><a href="imgadd.php"><i class="logo-sl"> <img width="20" height="20" src="https://img.icons8.com/glyph-neue/64/FFFFFF/gallery.png" alt="gallery"/> </i>  <span>Gallery</span></a></li>
				 <li><a href="Profile.php"><i class="logo-sl"> <img width="20" height="20" src="https://img.icons8.com/ios/50/FFFFFF/contract-job.png" alt="contract-job"/></i> <span>My Profile </span></li></a>
				 <li><a href="index.php"><i class="fa-dashboard fa logo-sl"></i> <span style="position:relative !important; left: 10px;" > Logout </span> </a> </li>
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
        <img src="dist/img/logo (2).png" class="img-circle" style="height: 50px !important;width: 100px !important;" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Parent's</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    
    <ul class="sidebar-menu" data-widget="tree">     
        <li><a href="master2.php"><i class="fa-dashboard fa logo-sl"></i> <span style="position:relative !important; left: 10px;" > Dashboard </span></a></li>
				<li><a href="parentatten.php"><i class="logo-sl"> <img width="20" height="20" src="https://img.icons8.com/sf-black/64/FFFFFF/checked-user-male.png" alt="checked-user-male"/> </i> <span>Attendance Report</span></a></li>
				<li><a href="pstudentmasterreport.php"><i class="logo-sl"> <img width="20" height="20" src="https://img.icons8.com/ios-glyphs/30/FFFFFF/statistics-report.png" alt="statistics-report"/> </i> <span>Student Report</span></a></li>
        <li><a href="pLearningview.php"><i class="logo-sl"> <img width="20" height="20" src="https://img.icons8.com/external-basicons-solid-edtgraphics/50/FFFFFF/external-Teacher-teachers-basicons-solid-edtgraphics-17.png" alt="external-Teacher-teachers-basicons-solid-edtgraphics-17"/> </i> <span>Learning Center</span></a></li>
				<li><a href="imgadd.php"><i class="logo-sl"> <img width="20" height="20" src="https://img.icons8.com/glyph-neue/64/FFFFFF/gallery.png" alt="gallery"/> </i> <span>Gallery</span></a></li>
				<li><a href="pnoticeview.php"><i class="logo-sl"> <img width="20" height="20" src="https://img.icons8.com/ios-filled/50/FFFFFF/break--v1.png" alt="break--v1"/> </i> <span>Notices</span></a></li>
				<li><a href="phelpdesk.php"><i class="logo-sl"> <img width="20" height="20" src="https://img.icons8.com/ios-filled/50/FFFFFF/online-support.png" alt="online-support"/> </i> <span>Help Desk</span></a></li>
				<li><a href="paboutus.php"><i class="logo-sl">  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 64 64" style="fill:#FFFFFF; position: relative; top: 6px;"> <path d="M 9 10 C 6.791 10 5 11.791 5 14 L 5 48 C 5 50.209 6.791 52 9 52 L 35.789062 52 L 35 62 L 46.865234 52 L 55 52 C 57.209 52 59 50.209 59 48 L 59 14 C 59 11.791 57.209 10 55 10 L 9 10 z M 32 17 C 34.209 17 36 18.791 36 21 C 36 23.209 34.209 25 32 25 C 29.791 25 28 23.209 28 21 C 28 18.791 29.791 17 32 17 z M 31 29 L 35 29 L 35 43 L 29 43 L 29 31 L 31 29 z"></path> </svg> </i> <span>About Us </span></a></li>
				<li><a href="pcontactus.php"><i class="logo-sl"> <img width="22" height="22" src="https://img.icons8.com/windows/32/FFFFFF/business-contact.png" alt="business-contact"/> </i> <span>Contact Us</span></a></li>
        <li><a href="https://www.rabbiglobalacademy.com/"><i class="logo-sl"> <img width="20" height="20" src="https://img.icons8.com/ios-filled/50/FFFFFF/domain.png" alt="domain"/> </i> <span>Website</span></a></li>
        <li><a href="Profile.php"><i class="logo-sl"> <img width="20" height="20" src="https://img.icons8.com/ios/50/FFFFFF/contract-job.png" alt="contract-job"/></i> <span>My Profile </span></li></a>
				<li><a href="index.php"><i class="fa-dashboard fa logo-sl"></i> <span style="position:relative !important; left: 10px;" > Logout </span> </a> </li>
      </ul>
	  
    </section>
    <!-- /.sidebar -->
  </aside>


<?php
}

 