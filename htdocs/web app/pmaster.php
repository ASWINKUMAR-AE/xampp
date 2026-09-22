<?php
session_start();
?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include("header.php"); ?>
<?php include("slide1.php"); ?>



  <!-- Content Wrapper. Contains page content -->
  <style type="text/css">
<!--
.style1 {
	color: #445E94;
	font-weight: bold;
}
-->
#hvb 
 {
	box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
 }
 #trans{
  transition:all 0.5s;
 }
 #trans:hover{

transform: scale(0.8);
 }

  </style>
  
  <div class="content-wrapper" style="background-color:#FFFFFF">
    <!-- Content Header (Page header) -->
   <div  align="center">
   <img src="" />
   <h2 align="center" class="style1"> Rabbi Global Academy</h2>
   </div>

    <!-- Main content -->
    <section class="content" >
      <!-- Small boxes (Stat box) -->
      <div class="row">
       
	
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6" id="trans">
          <!-- small box -->
          <div class="small-box" style="background-color:#ffffff" id="hvb">
            <div class="inner" align="center">
             <a href="parentatten.php" class="small-box-footer">   
         <img src="dist/img/at.png" >
            <p style="color:#000000"><strong>Attedence Report</strong></p></a>
			  
            </div>
           
          </div>
        </div>
		
		<div class="col-lg-6 col-xs-6" id="trans">
          <!-- small box -->
          <div class="small-box" style="background-color:#ffffff" id="hvb">
            <div class="inner" align="center">
               <a href="pstudentmasterreport.php"class="small-box-footer">  <img src="dist/img/report.png" >
    
            <p style="color:#000000"><strong>students Report</strong></p></a>
			
            </div>
          
          </div>
        </div>
		
		<div class="col-lg-6 col-xs-6" id="trans">
          <!-- small box -->
          <div class="small-box"style="background-color:#ffffff" id="hvb" >
            <div class="inner" align="center">
            <a href="pLearningview.php"class="small-box-footer">   <img src="dist/img/lc.png" >

             <p style="color:#000000"><strong>Learning center </strong></p></a>
			  
            </div>
          
          </div>
        </div>
		
	
		<div class="col-lg-6 col-xs-6" id="trans">
          <!-- small box -->
          <div class="small-box" style="background-color:#ffffff" id="hvb">
            <div class="inner" align="center">
		 <a href="imgadd.php"class="small-box-footer"> <img src="dist/img/pi.png" >
             <p style="color:#000000"><strong>Gallery</strong></p></a>
			   
            </div>
           
          </div>
        </div>
	
		<div class="col-lg-6 col-xs-6" id="trans">
          <!-- small box -->
          <div class="small-box" style="background-color:#ffffff" id="hvb">
            <div class="inner" align="center">
             <a href="pnoticeview.php" class="small-box-footer">  

             <img src="dist/img/no.png" >
              <p style="color:#000000"><strong>Notices</strong></p></a>
			 
            </div>
          </div>
        </div>
		<div class="col-lg-6 col-xs-6" id="trans">
          <!-- small box -->
          <div class="small-box" style="background-color:#ffffff" id="hvb">
            <div class="inner" align="center">
              <a href="phelpdesk.php" class="small-box-footer">    
<img src="dist/img/su.png">
           <p style="color:#000000"><strong>Helpdesk</strong></p></a>
			 
            </div>
          
          </div>
        </div>
		
		<div class="col-lg-6 col-xs-6" id="trans">
          <!-- small box -->
          <div class="small-box " style="background-color:#ffffff" id="hvb">
            <div class="inner" align="center">
           <a href="paboutus.php"class="small-box-footer">      
<img src="dist/img/ab.png">
            <p style="color:#000000"><strong>About Us</strong></p></a>
			 
            </div>
     
          </div>
        </div>
		
		<div class="col-lg-6 col-xs-6" id="trans">
          <!-- small box -->
          <div class="small-box" style="background-color:#ffffff" id="hvb">
            <div class="inner" align="center">
              <a href="pcontactus.php" class="small-box-footer">  
<img src="dist/img/ca.png">
              <p style="color:#000000"><strong>Contact Us</strong></p></a>
				
          </div>
          
          </div>
        </div>
		
			
		
			<div class="col-lg-6 col-xs-6" id="trans">
          <!-- small box -->
          <div class="small-box" style="background-color:#ffffff" id="hvb">
            <div class="inner" align="center">
              
                  <a href="pProfile.php" class="small-box-footer">   
<img src="dist/img/mpp.png">
              <p style="color:#000000"><strong>My profile</strong></p></a>
				
          </div>
          
          </div>
        </div>
		
			<div class="col-lg-6 col-xs-6" id="trans">
          <!-- small box -->
          <div class="small-box " style="background-color:#ffffff" id="hvb">
       
     
          </div>
        </div>
	
		
		<div class="col-lg-6 col-xs-6" id="trans">
          <!-- small box -->
          <div class="small-box" style="background-color:#ffffff" id="hvb">
            <div class="inner" align="center">
		  <a href="index.php"class="small-box-footer">	<img src="dist/img/logout.png">

             <p style="color:#000000"><strong>Logout</strong></p></a>
			 
          </div>
          
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