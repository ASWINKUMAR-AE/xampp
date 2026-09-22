<?php error_reporting(0);		
		session_start(); 
  	include("header.php"); 
    include("connection/config.php"); 
    include("slide.php");    
			  if(count($_POST) > 0)
			  {
			    $att_id1 = $_POST['att_id'];
			    $c_val = $_POST['c_val'];
			    $date1 = date('Y-m-d');
			   	for ($j = 0; $j < count($c_val); $j++) 
    					{	
    					$present_val=$_POST['present_val'][$j];
					    $absent_val=$_POST['absent_val'][$j]; 
					    $halfday_val=$_POST['halfday_val'][$j];	
			   		 		
			      $k=0;
			      foreach ($att_id1 as $key => $value) 
			      {
			      $sqls1="INSERT INTO `stud_att` SET       
			      `present`='".$present_val."',     
			      `absent`='".$absent_val."',
			      `halfday`='".$halfday_val."',
			      `date`='".$date1."',
			      `att_id`='".$value."'";       
			       mysqli_query($CN,$sqls1);			       
			       $k++;       
			      }  

			    }			        
			     	   
			  }
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->   
    <!-- Main content -->
    <section class="content">	
			<div class="row">
				
						
	<form id="attval" name="att_val" method="post" enctype="multipart/form-data">
 
	 <div class="form-group col-md-3">
    </div> 
  
	  </div>
	
      <div class="row">
        <div class="col-xs-12">      

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Student Attendance Report(Center)</h3>
			  				<!--<div class="text-right">
                     <a  href="#" class="btn btn-primary">Excel </a>
					 				</div>-->
            </div>

        <div class="box-body table-responsive">
          <table id="example1" class="table datatable_full table-bordered table-striped">
            <thead>
            	<tr>
									<th>SNo</th>
									
									<th>Regno</th>
									<th>Student Name</th>
									<th>Center No</th>
									<th>Center Name</th>
									<th>Day Present</th>	
									<th>Day Absent</th>
									<th>Halfday Absent</th>		
							</tr>
            </thead>
            <tbody>
						<?php 
						$fdd=$_SESSION['SESS_LAST_NAMEE'];
						$attenance=mysqli_query($db,"SELECT * FROM `student` where cregno='$fdd'");
						$i=1;
						while($rowsval=mysqli_fetch_array($attenance)) 
						{	
						$totval[]=$i;						
							echo '<tr>
 							<td>'.$i.'</td>
 					
 							<td>'.$rowsval['srno'].'</td>
 							<td>'.$rowsval['sname'].'</td>
 							<td>'.$rowsval['cregno'].'</td>
									<td>'.$rowsval['cname'].'</td>
 							<td><div id="checkBoxes">
 							<input   type="checkbox" name="present_val[]" class="checkBoxClass"  id="present" value="1" style="margin: 5px 13px 0px -1px;" />
                </div></td> 
 							<td><div id="checkBoxes">
 							<input  type="checkbox" name="absent_val[]" class="checkBoxClass"  id="absent" value="0" style="margin: 5px 13px 0px -1px;"/>
                </div></td>
 							<td><div id="checkBoxes">
 							<input type="checkbox" name="halfday_val[]" class="checkBoxClass"  id="halfday_val" value="0.5" style="margin: 5px 13px 0px -1px;" />
                </div></td>

                <input type="hidden" name="att_id[]" id="att_id" value="'.$rowsval['id'].'">

 						</tr>';
					$i++;	}
 						?>
 						<tr>
 							<td colspan="7"><input type="hidden" name="c_val" value="<?php echo count($totval); ?>"></td>
 							<td ><input type="submit" name="multi_att" value="Submit" class="btn btn-primary btn-block btn-flat multi_att" id="multi_att"></td>
 						</tr>
            </tbody>
          </table>
        </div> 
            </div>
            <!-- /.box-header -->            
            <div class="box-body">
            </div>
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
  </form> 
  <!-- /.content-wrapper -->
    <?php include("footer.php"); ?>

    
     
   