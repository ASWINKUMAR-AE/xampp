 
   <?php include("connection/config.php");
 session_start(); 
if(isset($_POST['btnAdd']) )
  {
 
     $datas = array_filter($_POST);

	
	 $datas['dat'] = jk_mysql_datetime();
		


      $insertRoute = jk_insert_data(NOTES,$datas);
		  
		 if($insertRoute)
      {
		  
	  echo "<script>alert('Record Save  Successfully!');window.location.href='noticeview.php';</script>";}

  }

?>
 <?php include("header.php"); ?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php include("slide.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <!-- Main content -->
    <section class="content">
	
	
	
	
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">

              <h3 class="box-title">Notices</h3>
			  <div class="text-right">
                     <a  href="noticeview.php" class="btn btn-primary">Back</a>
					 </div>
            </div>
												<?php 



$query1=mysqli_query($CN,"select max(sno)+1 as number from notes")or die(mysqli_error());

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
					   <form id="signupform" method="post" action="notes.php" class="form-horizontal" role="form" enctype="multipart/form-data">
					     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">S.No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="sno" class="form-control col-md-7 col-xs-12" value="<?php echo $numbe; ?>" data-validate-length-range="6" data-validate-words="2" name="sno" placeholder="S.No" required="required" type="text">
                        </div>
						
                      </div>
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="dat" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  name="adt" placeholder="Date" required="required" type="date">
                        </div>
                      </div>
					  
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Message <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="message" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  name="message" placeholder="Message" required="required" type="text">
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
                          <button id="send" type="submit" name="btnAdd"  onclick="window.location.href='home.php'"  class="btn btn-danger">Submit</button>
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
