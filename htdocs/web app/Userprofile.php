 <?php
 include("connection/config.php");
session_start();
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

              <h3 class="box-title">User Register Master</h3>
			  <div class="text-right">
                     <a  href="Userview.php" class="btn btn-primary">User View </a>&nbsp;&nbsp;<a href="master.php" class="btn btn-primary">Back </a>
					 </div>
            </div>
			<?php 



$query1=mysqli_query($CN,"select max(sno)+1 as number from register")or die(mysqli_error());

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
					   <form id="signupform" method="post" action="useradd.php" class="form-horizontal" role="form" enctype="multipart/form-data">
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">S.No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="sno" class="form-control col-md-7 col-xs-12" value="<?php echo $numbe; ?>" data-validate-length-range="6" data-validate-words="2"  name="sno" placeholder="Sno" required="required" type="text">
                        </div>
                      </div>
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="dat" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="dat" placeholder="DOB" required="required" type="date">
                        </div>
						
                      </div>
					      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="typ" class="form-control" id="typ">
                                                    <option value="Center">Center</option>
                                                    <option value="Parents">Parents</option>
                                                  
                                                  </select>
                        </div>
						
                      </div>
					     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Regno <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="regno" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  name="regno" placeholder="Register No" required="required" type="text">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  name="name" placeholder="Name" required="required" type="text">
                        </div>
                      </div>
					
					 
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Mobile No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="mno" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="mno" placeholder="Mobileno" required="required" type="text">
                        </div>
						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="email" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="email" placeholder="Email" required="required" type="text">
                        </div>
						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="uname" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="uname" placeholder="Username" required="required" type="text">
                        </div>
						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="pword" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="pword" placeholder="Password" required="required" type="text">
                        </div>
						
                      </div>
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">File Upload<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="img" name="img" type="file" />
                        </div>
						
                      </div>
					  
					   
                     
                  
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset" class="btn btn-primary">Cancel</button>
                          <button id="send" type="submit" name="submit"    class="btn btn-danger">Submit</button>
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