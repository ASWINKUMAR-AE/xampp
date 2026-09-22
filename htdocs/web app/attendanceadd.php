  <?php include("connection/config.php");
 session_start(); 
if(isset($_POST['btnAdd']) )
  {
 
     $datas = array_filter($_POST);

	
	 $datas['date_of_create'] = jk_mysql_datetime();
		


      $insertRoute = jk_insert_data(ATTEDANCE,$datas);
		  
		 if($insertRoute)
      {
		  
	  echo "<script>alert('Record Save  Successfully!');</script>";}

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

              <h3 class="box-title">Student Attedance</h3>
		
            </div>
										<?php 



$query1=mysqli_query($CN,"select max(sno)+1 as number from attedance")or die(mysqli_error());

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
					   <form id="signupform" method="post" action="attendanceadd.php"  class="form-horizontal" role="form" enctype="multipart/form-data">
					     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sno<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" name="sno"  id="sno" data-validate-length-range="6" data-validate-words="2" value="<?php echo $numbe; ?>"  placeholder="Sno" required="required" type="text">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Regno<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="regno" class="form-control col-md-7 col-xs-12" name="regno"  id="regno" data-validate-length-range="6" data-validate-words="2"  placeholder="Reg No" required="required" type="text">
                        </div>
                      </div>
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="Mobile No">Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" name="dat" id="dat" data-validate-length-range="6" data-validate-words="2" placeholder="Date" required="required" type="date">
                        </div>
						
                      </div>
                      
					
					 
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="Mobile No">Student Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" name="sname" id="sname" data-validate-length-range="6" data-validate-words="2" placeholder="Student Name" required="required" type="text">
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
					       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="subj" class="form-control" id="subj">
                                                    <option value="1">Half Day</option>
                                                    <option value="1">Full Day</option>
                                                  
                                                  </select>
                        </div>
						
                      </div>
					     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Attedance <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="msg" class="form-control" id="msg">
                                                    <option value="1">Present</option>
                                                    <option value="0">Absent</option>
                                                  
                                                  </select>
                        </div>
						
                      </div>
					  
					 					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset" class="btn btn-primary">Clear</button>
                          <button id="send" type="submit" name="btnAdd" onclick="window.location.href='home.php'"  class="btn btn-danger">Submit</button>
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