 <?php session_start(); ?>
 <?php include("connection/config.php");

if(isset($_POST['btnAdd']))
  {

     $datas = array_filter($_POST);
	 $datas['date_of_create'] = jk_mysql_datetime();
	  $insertRoute = jk_insert_data(STUDENT,$datas);
		  
	 echo "<script>alert('Student Record Save Successfully!');window.location.href='studentview.php';</script>";
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
			
					  
					  <form id="signupform" method="post" action="" class="form-horizontal" role="form" enctype="multipart/form-data">
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Register Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="srno" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="srno" placeholder="Register Number" required="required" type="number">
                        </div>
						
                      </div>

<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Center No<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="cregno" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="cregno" placeholder="Center No" required="required" type="text">
                        </div>
						
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Student Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="sname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  name="sname" placeholder="Student Name" required="required" type="text">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="date" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  name="date" placeholder="Date" required="required" type="date">
                        </div>
                      </div>
					
					 
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="sdob" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="sdob" placeholder="Date Of Birth" required="required" type="date">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Aadhar Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="sanum" class="form-control col-md-7 col-xs-12" onkeypress="return isNumber(event)" data-validate-length-range="6" data-validate-words="2" name="sanum" placeholder="Aadhar Number" required="required" type="number">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Current Residential Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="saddress" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="saddress" placeholder="Current Residential Address" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Blood Group <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="sbgroup" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="sbgroup" placeholder="Blood Group" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Nationality <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="snation" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="snation" placeholder="Nationality" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">School <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="sschool" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="sschool" placeholder="School" required="required" type="text">
                        </div>
						
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Center name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <select name="cname" class="form-control" id="cname">
                                                  <?php
							$sql="select * from tutor";
							$query=mysqli_query($CN,$sql);
							while($row = mysqli_fetch_array($query)){  
						?>
						<option value="<?php echo $row["id"];?>"><?php echo $row['centername']; ?> </option>
						<?php
							} 
						?>
                                                  
                                                  </select>
                        </div>
						  
                      </div>
                  
					  
                
                 
				   
				   <div class="box-header">

              <h3 class="box-title">Parent Master</h3>
		
            </div>
			<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Parent Regno<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="pregno" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="pregno" placeholder="Parent Regno" required="required" type="text">
                        </div>
						
                      </div>
					   
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Father Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  name="fname" placeholder="Father Name" required="required" type="text">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Father DOB <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fdob" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="fdob" placeholder="Father DOB" required="required" type="date">
                        </div>
						
                      </div>
					 
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Profession <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fprof" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="fprof" placeholder="Profession" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Aadhar Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fanum" class="form-control col-md-7 col-xs-12" onkeypress="return isNumber(event)" data-validate-length-range="6" data-validate-words="2" name="fanum" placeholder="Aadhar Number" required="required" type="number">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Mobile No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fmno" class="form-control col-md-7 col-xs-12" onkeypress="return isNumber(event)" data-validate-length-range="6" data-validate-words="2" name="fmno" placeholder="Mobile No" required="required" type="number">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="femail" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="femail" placeholder="Email" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Education <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fedu" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="fedu" placeholder="Education" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Anniversary Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fadate" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="fadate" placeholder="Anniversary Date" required="required" type="date">
                        </div>
						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Mother Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="mnme" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="mnme" placeholder="Mother Name" required="required" type="text">
                        </div>
						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Mother DOB <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="mdob" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="mdob" placeholder="Mother DOB" required="required" type="date">
                        </div>
						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Profession <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="mprof" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="mprof" placeholder="Profession" required="required" type="text">
                        </div>
						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Aadhar No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="mano" class="form-control col-md-7 col-xs-12" onkeypress="return isNumber(event)" data-validate-length-range="6" data-validate-words="2" name="mano" placeholder="Aadhar No" required="required" type="text">
                        </div>
						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Mobile No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="mmno" class="form-control col-md-7 col-xs-12" onkeypress="return isNumber(event)" data-validate-length-range="6" data-validate-words="2" name="mmno" placeholder="Mobile No" required="required" type="number">
                        </div>
						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="memail" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="memail" placeholder="Email" required="required" type="text">
                        </div>
						
                      </div>
                     
                  
					  
                      
                 
				   
				   <div class="box-header">

              <h3 class="box-title">Guardian Master</h3>
			
            </div>
			
					
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Guardian Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="gname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  name="gname" placeholder="Guardian Name" required="required" type="text">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">DOB <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="gdob" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="gdob" placeholder="DOB" required="required" type="date">
                        </div>
						
                      </div>
					 
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Mobile No<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="gmno" class="form-control col-md-7 col-xs-12" onkeypress="return isNumber(event)" data-validate-length-range="6" data-validate-words="2" name="gmno" placeholder="Mobile No" required="required" type="text">
                        </div>
						
                      </div>
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="Mobile No">Notes <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" name="nott" id="nott"data-validate-length-range="6" data-validate-words="2" placeholder="Notes" required="required" type="text">
                        </div>
						
                      </div>
					     
                     
                  <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset" class="btn btn-primary">Clear</button>
                          <button id="btnAdd" name="btnAdd" type="submit"   class="btn btn-danger">Submit</button>
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