 <?php session_start(); ?>
 <?php include("connection/config.php");

 if(@$_GET['action']=="edit" and isset($_GET['srno']))

    {

      $c_id=$_GET['srno'];

      $school_details=jk_select_data(STUDENT,"where srno='$c_id'");

     extract($school_details[0]);

     

      }
  	   if(isset($_POST['btnUpdate']))

      {
	  $srno=$_POST['srno'];

  

     $datas = array_filter($_POST);



	

      $datas['date_of_create'] = jk_mysql_datetime();

      $insertRoute = jk_update_data(STUDENT,$datas,"srno","$srno");

	  

      if($insertRoute)

      {

		 
			   echo "<script>alert('Record Edited  Successfully!');window.location.href='studentview.php';</script>";

      }

      else

      {

         // pg_query("ROLLBACK");

          $FormResponse= jk_form_error($insertRoute);

          extract($_POST);

      }
	  }

	  


?>
 
 
 
 <?php include("header.php"); ?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php include("slide.php"); ?>
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

              <h3 class="box-title">Student Master</h3>
			  <div class="text-right">
                     <a  href="studentview.php" class="btn btn-primary">Back </a>
					 </div>
            </div>
			
					  
					  <form id="signupform" method="post" action="studentedit.php" class="form-horizontal" role="form" enctype="multipart/form-data">
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Register Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="srno" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="srno" value="<?php echo $srno; ?>" placeholder="Register Number" required="required" type="number">
                        </div>
						
                      </div>

<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Center No<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="cregno" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="cregno" value="<?php echo $cregno; ?>" placeholder="Center No" required="required" type="text">
                        </div>
						
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Student Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="sname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  name="sname" value="<?php echo $sname; ?>" placeholder="Student Name" required="required" type="text">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="date" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  name="date" value="<?php echo $date; ?>" placeholder="Date" required="required" type="date">
                        </div>
                      </div>
					
					 
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="sdob" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="sdob" value="<?php echo $sdob; ?>" placeholder="Date Of Birth" required="required" type="date">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Aadhar Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="sanum" class="form-control col-md-7 col-xs-12" onkeypress="return isNumber(event)" data-validate-length-range="6" data-validate-words="2" name="sanum" value="<?php echo $sanum; ?>" placeholder="Aadhar Number" required="required" type="number">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Current Residential Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="saddress" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="saddress" value="<?php echo $saddress; ?>" placeholder="Current Residential Address" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Blood Group <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="sbgroup" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="sbgroup" value="<?php echo $sbgroup; ?>" placeholder="Blood Group" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Nationality <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="snation" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="snation" value="<?php echo $snation; ?>" placeholder="Nationality" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">School <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="sschool" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="sschool" value="<?php echo $sschool; ?>" placeholder="School" required="required" type="text">
                        </div>
						
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Center name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="cname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="cname" value="<?php echo $cname; ?>" placeholder="Center Name" required="required" type="text">
                        </div>
						  
                      </div>
                  
					  
                
                 
				   
				   <div class="box-header">

              <h3 class="box-title">Parent Master</h3>
		
            </div>
			<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Parent Regno<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="pregno" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="pregno" value="<?php echo $pregno; ?>" placeholder="Parent Regno" required="required" type="text">
                        </div>
						
                      </div>
					   
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Father Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  name="fname" value="<?php echo $fname; ?>" placeholder="Father Name" required="required" type="text">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Father DOB <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fdob" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="fdob" value="<?php echo $fdob; ?>" placeholder="Father DOB" required="required" type="date">
                        </div>
						
                      </div>
					 
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Profession <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fprof" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="fprof" value="<?php echo $fprof; ?>" placeholder="Profession" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Aadhar Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fanum" class="form-control col-md-7 col-xs-12" onkeypress="return isNumber(event)" data-validate-length-range="6" data-validate-words="2" name="fanum" value="<?php echo $fanum; ?>" placeholder="Aadhar Number" required="required" type="number">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Mobile No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fmno" class="form-control col-md-7 col-xs-12" onkeypress="return isNumber(event)" data-validate-length-range="6" data-validate-words="2" name="fmno" value="<?php echo $fmno; ?>" placeholder="Mobile No" required="required" type="number">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="femail" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="femail" value="<?php echo $femail; ?>" placeholder="Email" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Education <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fedu" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="fedu" value="<?php echo $fedu; ?>" placeholder="Education" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Anniversary Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fadate" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="fadate" value="<?php echo $fadate; ?>" placeholder="Anniversary Date" required="required" type="date">
                        </div>
						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Mother Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="mnme" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="mnme" value="<?php echo $mnme; ?>" placeholder="Mother Name" required="required" type="text">
                        </div>
						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Mother DOB <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="mdob" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="mdob" value="<?php echo $mdob; ?>" placeholder="Mother DOB" required="required" type="date">
                        </div>
						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Profession <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="mprof" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="mprof" value="<?php echo $mprof; ?>" placeholder="Profession" required="required" type="text">
                        </div>
						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Aadhar No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="mano" class="form-control col-md-7 col-xs-12" onkeypress="return isNumber(event)" data-validate-length-range="6" data-validate-words="2" name="mano" value="<?php echo $mano; ?>" placeholder="Aadhar No" required="required" type="text">
                        </div>
						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Mobile No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="mmno" class="form-control col-md-7 col-xs-12" onkeypress="return isNumber(event)" data-validate-length-range="6" data-validate-words="2" name="mmno" value="<?php echo $mmno; ?>" placeholder="Mobile No" required="required" type="number">
                        </div>
						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="memail" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="memail" value="<?php echo $memail; ?>" placeholder="Email" required="required" type="text">
                        </div>
						
                      </div>
                     
                  
					  
                      
                 
				   
				   <div class="box-header">

              <h3 class="box-title">Guardian Master</h3>
			
            </div>
			
					
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Guardian Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="gname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  name="gname" value="<?php echo $gname; ?>" placeholder="Guardian Name" required="required" type="text">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">DOB <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="gdob" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="gdob" value="<?php echo $gdob; ?>" placeholder="DOB" required="required" type="date">
                        </div>
						
                      </div>
					 
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Mobile No<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="gmno" class="form-control col-md-7 col-xs-12" onkeypress="return isNumber(event)" data-validate-length-range="6" data-validate-words="2" name="gmno" value="<?php echo $gmno; ?>" placeholder="Mobile No" required="required" type="text">
                        </div>
						
                      </div>
					     
                     
                  <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset" class="btn btn-primary">Clear</button>
                        <button id="btnUpdate" name="btnUpdate" type="submit"  class="btn btn-danger">Submit</button>
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