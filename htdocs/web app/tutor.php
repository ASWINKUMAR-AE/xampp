 <?php include("connection/config.php");
 session_start(); 
if(isset($_POST['btnAdd']) )
  {
 
     $datas = array_filter($_POST);

	
	 $datas['dat'] = jk_mysql_datetime();
		


      $insertRoute = jk_insert_data(TUTOR,$datas);
		  
		 if($insertRoute)
      {
		  
	  echo "<script>alert('Record Save Sucessfully!');window.location.href='tutorview.php';</script>";

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
									<?php 



$query1=mysqli_query($CN,"select max(sno)+1 as number from tutor")or die(mysqli_error());

$query2=mysqli_fetch_array($query1);

$numb=$query2['number'];

if($numb==0)

{

$numbe=1;

}

else

{

$numbe=$numb;

}

?>
					   <form id="signupform" method="post" action="tutor.php "class="form-horizontal" role="form" enctype="multipart/form-data">
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">S.No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="sno" id="sno" class="form-control col-md-7 col-xs-12" value="<?php echo $numbe; ?>" data-validate-length-range="6" data-validate-words="2"   placeholder="Sno" required="required" type="text">
                        </div>
                      </div>
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  name="dat" id="dat" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"   placeholder="Date" required="required" type="date">
                        </div>
                      </div>
					 
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tutor Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  name="tutorname"id="tutorname" placeholder="Tutor Name" required="required" type="text">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">DOB <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="dob" id="dob" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="DOB" required="required" type="date">
                        </div>
						
                      </div>
					 
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Mobile No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="mobileno" id="mobileno" onkeypress="return isNumber(event)" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Mobile No" required="required" type="text">
                        </div>
						
                      </div>
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Alternative Mobile No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="amno" id="amno" onkeypress="return isNumber(event)" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Mobile No" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="email"id="email" placeholder="Email" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No"> Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="address" id="address" placeholder=" Address" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Aadhar No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" onkeypress="return isNumber(event)" data-validate-length-range="6" data-validate-words="2" name="aatherno" id="aatherno" placeholder="Aadhar No" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Education <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12"  data-validate-length-range="6" data-validate-words="2" name="education" id="education" placeholder="Education" required="required" type="text">
                        </div>
						
                      </div>
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Center Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" name="centername"  id="centername"data-validate-length-range="6" data-validate-words="2"  placeholder="Center Name" required="required" type="text">
                        </div>
                      </div>
					
					 
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="Mobile No">Center No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" name="cregno" id="cregno"data-validate-length-range="6" data-validate-words="2" placeholder="Center No" required="required" type="text">
                        </div>
						
                      </div>
					  
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="Mobile No">Guest Lecturer Name  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" name="gname" id="gname"data-validate-length-range="6" data-validate-words="2" placeholder="Guest Lecturer Name" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="Mobile No">Mobile No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" name="gmno" id="gmno"data-validate-length-range="6" data-validate-words="2" placeholder="Mobile No" required="required" type="text">
                        </div>
						
                      </div>
					  
					  
					     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="Mobile No">Notes <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" name="nott" id="nott"data-validate-length-range="6" data-validate-words="2" placeholder="Notes" required="required" type="text">
                        </div>
						
                      </div>
                     
                  
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset" class="btn btn-primary">Clear</button>
                          <button id="btnAdd" name="btnAdd" type="submit"  onclick="window.location.href='tutorview.php'"  class="btn btn-danger">Submit</button>
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