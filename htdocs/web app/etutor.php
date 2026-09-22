<?php
session_start();
?>
<?php include("connection/config.php");

 if(@$_GET['action']=="edit" and isset($_GET['sno']))

    {

      $c_id=$_GET['sno'];

      $school_details=jk_select_data(TUTOR,"where sno='$c_id'");

     extract($school_details[0]);

     

      }
  	   if(isset($_POST['btnUpdate']))

      {
	  $sno=$_POST['sno'];

  

     $datas = array_filter($_POST);



	

      $datas['date_of_create'] = jk_mysql_datetime();

      $insertRoute = jk_update_data(TUTOR,$datas,"sno","$sno");

	  

      if($insertRoute)

      {

		 
			   echo "<script>alert('Record Edited  Successfully!');window.location.href='tutorview.php';</script>";

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

              <h3 class="box-title">Tutor Master</h3>
			  <div class="text-right">
                     <a  href="tutorview.php" class="btn btn-primary">Back </a>
					 </div>
            </div>
			
					   <form id="signupform" method="post" action="etutor.php "class="form-horizontal" role="form" enctype="multipart/form-data">
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">S.No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="sno" id="sno" value="<?php echo $sno; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"   placeholder="Sno" required="required" type="text">
                        </div>
                      </div>
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="dat" id="dat" value="<?php echo $dat; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"   placeholder="Sno" required="required" type="text">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tutor Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" value="<?php echo $tutorname; ?>"  name="tutorname"id="tutorname" placeholder="Tutor Name" required="required" type="text">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">DOB <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="dob" name="dob" value="<?php echo $dob; ?>"   class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="DOB" required="required" type="date">
                        </div>
						
                      </div>
					 
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Mobile No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $mobileno; ?>" name="mobileno" id="mobileno" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Mobile No" required="required" type="text">
                        </div>
						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Alternative Mobile No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $amno; ?>"name="amno" id="amno" onkeypress="return isNumber(event)" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Mobile No" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="email"id="email" value="<?php echo $email; ?>"  placeholder="Email" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No"> Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="address" value="<?php echo $address; ?>" id="address" placeholder=" Address" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Aadhar No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="aatherno" value="<?php echo $aatherno; ?>" id="aatherno" placeholder="Aadhar No" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Education <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $education; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="education" id="education" placeholder="Education" required="required" type="text">
                        </div>
						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Center Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $centername; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="centername" id="centername" placeholder="Education" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="Mobile No">Center No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $cregno; ?>" class="form-control col-md-7 col-xs-12" name="cregno" id="cregno"data-validate-length-range="6" data-validate-words="2" placeholder="Center No" required="required" type="text">
                        </div>
						
                      </div>
                     
					 
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="Mobile No">Guest Lecturer Name  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $gname; ?>" class="form-control col-md-7 col-xs-12" name="gname" id="gname"data-validate-length-range="6" data-validate-words="2" placeholder="Guest Lecturer Name" required="required" type="text">
                        </div>
						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="Mobile No">Mobile No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $gmno; ?>" class="form-control col-md-7 col-xs-12" name="gmno" id="gmno"data-validate-length-range="6" data-validate-words="2" placeholder="Mobile No" required="required" type="text">
                        </div>
						
                      </div>
                  
				   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="Mobile No">Notes <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $nott; ?>" class="form-control col-md-7 col-xs-12" name="nott" id="nott"data-validate-length-range="6" data-validate-words="2" placeholder="Notes" required="required" type="text">
                        </div>
						
                      </div>
				  
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                      
                          <button id="send" name="btnUpdate" type="submit"  onclick="window.location.href='tutorview.php'"  class="btn btn-danger">Submit</button>
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
 