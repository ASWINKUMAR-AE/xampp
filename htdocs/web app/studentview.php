<?php session_start(); 

		

?>

<?php include("connection/config.php");

  if(@$_GET['action']=="delete" and isset($_GET['id']))

		{

		  $id= $_GET['id'];;

		   

		  jk_delete_data(STUDENT,"id",$id);

		  jk_redirect_success_url('studentview.php?success=Successfully Deleted');

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
		<?php

			  $where	="where 1=1";

				if(isset($_POST['fdat']) && isset($_POST['tdat'])){
					
					$fdat=$_POST['fdat'];
					$tdat=$_POST['tdat'];
				
					$where	.=" and dat between  '$fdat' and  '$tdat' ";
				}
				
				if(isset($_POST['des'])){
					
					$des=$_POST['des'];
					//$td=$_POST['tdat'];
				
					$where	.=" and des =  '$des'";
				}
		
		?>	 
						
	<form method="post" style="display:none" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group col-md-3">
      <label for="pwd">From:</label>
      <input type="date" id="fdat" name="fdat" class="form-control" value="<?php echo $fdat; ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="pwd">To:</label>
      <input type="date" id="tdat" name="tdat" class="form-control" value="<?php echo $tdat; ?>">
    </div>

    <div class="form-group col-md-3">
	 
    <button type="submit" name="search" class="btn btn-danger" style="margin-top: 24px;">Search</button>
	</div>
	
	 <div class="form-group col-md-3">
    </div> 
  </form> 
	  </div>
	
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Student  Master </h3>
			  <div class="text-right">
                     <a  href="student.php" class="btn btn-primary">Add Data </a>&nbsp;&nbsp;<a href="master.php" class="btn btn-primary">Back </a>
					 </div>
            </div>

            <!-- /.box-header -->            <div class="box-body">								
			
							

  
			  
			  <div class="box-body table-responsive">

          <table id="example1" class="table datatable_full table-bordered table-striped">

            <thead>

              <tr>

  <th>Register No</th>
  <th>Center No</th>
  <th>Parent Regno</th>
  
                <th>Student Name</th>

              

                <th>D.O.B</th>

                <th>Aadhar Number</th>
				       <th>Address</th>
					          <th>Blood Group</th>
							         <th>Nationality</th>
									        <th>School</th>
											     <th>Action</th>  

        

              </tr>

            </thead>

            <tbody>

              <?php 
			  
		

	$i=1;
$t=$_SESSION["SESS_LAST_NAMEE"];
//echo $t;
	
										$arrCab =jk_select_data(STUDENT,$where);
									
//print_r($arrCab);


										 foreach($arrCab as $ep) {		

										

										 								?>

              <tr>

              
         <td data-label="Register No"><?php echo $ep['srno'];?></td>
		 <td data-label="Center No"><?php echo $ep['cregno'];?></td>
		 <td data-label="Parent Regno"><?php echo $ep['pregno'];?></td>
                <td data-label="Student Name"><?php echo $ep['sname'];?></td>

       

     <td data-label="D.O.B"><?php echo $ep['sdob'];?></td>
	  <td data-label="Aadhar No"><?php echo $ep['sanum'];?></td>
	   <td data-label="Address"><?php echo $ep['saddress'];?></td>
	    <td data-label="Blood Group"><?php echo $ep['sbgroup'];?></td>
		 <td data-label="Nationality"><?php echo $ep['snation'];?></td>
		  <td data-label="School"><?php echo $ep['sschool'];?></td>
		  
		   

            
			<td>

                      <a href="studentedit.php?action=edit&srno=<?php echo $ep['srno'];?>"><span class="label label-info">EDIT</span></a> 

                <?php 

					?>
<a href="studentview.php?action=delete&id=<?php echo $ep['id'];?>" onClick="return confirm('are you sure want to delete?');"><span class="label label-warning">Delete</span></a>
                <?php ?>

                </td>
			
			
			

              </tr>

              <?php 



										   $i++;



	} 								?>

            </tbody>

          </table>

        </div>

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
  <!-- /.content-wrapper -->
  <?php include("footer.php"); ?>