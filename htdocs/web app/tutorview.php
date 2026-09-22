<?php session_start(); ?>
<?php include("connection/config.php");
  if(@$_GET['action']=="delete" and isset($_GET['sno']))

		{

		  $cab_id= $_GET['sno'];;

		   

		  jk_delete_data(TUTOR,"sno",$cab_id);

		  jk_redirect_success_url('tutorview.php?success=Successfully Deleted');

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
              <h3 class="box-title">Tutor Master</h3>
            </div>
 <div class="text-right">
                     <a  href="tutor.php" class="btn btn-primary">Add Data</a>&nbsp;&nbsp;<a href="master.php" class="btn btn-primary">Back </a>					 </div>
					
          </div>
            <!-- /.box-header -->            <div class="box-body">								
			
							x`

  
			  
			  <div class="box-body table-responsive">

          <table id="example1" class="table datatable_full table-bordered table-striped">

            <thead>

              <tr>

                <th style="">SNo</th>
                <th style=""> Date</th>
                <th style=""> Center No</th>
                <th style="">Center Name</th>
                <th style=""> TutorName</th>
		        		<th style=""> D.O.B</th>
                <th style="">Mobile no</th>
                <th style="">Alternative Mobile No</th>
                <th style=""> email</th>
			          <th style=""> Address</th>
				        <th style=""> Aatherno</th>
                <th style=""> Education</th>
                <th style=""> Guest Lecturer Name</th>
                <th style=""> Mobileno</th>
	              <th style=""> Notes</th>			 
                <th style=""> Action</th>											          

              </tr>
            </thead>

            <tbody >

              <?php 
			  
		

	$i=1;

	
										$arrCab =jk_select_data(TUTOR,$where);
//print_r($arrCab);


										 foreach($arrCab as $ep) {		

										

										 								?>

              <tr>

               
       <td data-label="Sno" style="overflow: auto;"><?php echo $ep['sno'];?></td>
	   <td data-label="Date" style="overflow: auto;"><?php echo $ep['dat'];?></td>
	      <td data-label="Center No" style="overflow: auto;"><?php echo $ep['cregno'];?></td>
		     <td data-label="Center Name" style="overflow: auto;"><?php echo $ep['centername'];?></td>
                <td data-label="Tutor Name" style="overflow: auto;"><?php echo $ep['tutorname'];?></td>
				  <td data-label="Date of Birth" style="overflow: auto;"><?php echo $ep['dob'];?></td>
				    <td data-label="Mobileno" style="overflow: auto;"><?php echo $ep['mobileno'];?></td>
 <td data-label="Alternative Mobileno" style="overflow: auto;"><?php echo $ep['amno'];?></td>
                <td data-label="Email" style="overflow: auto;"><?php echo $ep['email'];?></td>

     <td data-label="Address" style="overflow: auto;"><?php echo $ep['address'];?></td>
	   <td data-label="Aadharno" style="overflow: auto;"><?php echo $ep['aatherno'];?></td>
	     <td data-label="Education" style="overflow: auto;"><?php echo $ep['education'];?></td>
	 <td data-label="Guest Lecturer Name" style="overflow: auto;"><?php echo $ep['gname'];?></td>
	  <td data-label="Mobileno" style="overflow: auto;"><?php echo $ep['gmno'];?></td>
	   
	    	  <td data-label="Mobileno" style="overflow: auto;"><?php echo $ep['nott'];?></td> 
	
		

                <td>

                <a href="etutor.php?action=edit&sno=<?php echo $ep['sno'];?>"><span class="label label-info">EDIT</span></a> 

                <?php 

					?>
<a href="tutorview.php?action=delete&sno=<?php echo $ep['sno'];?>" onClick="return confirm('are you sure want to delete?');"><span class="label label-warning">Delete</span></a>
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