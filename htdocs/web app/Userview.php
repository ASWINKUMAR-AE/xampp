<?php session_start(); ?>
<?php include("connection/config.php");
  if(@$_GET['action']=="delete" and isset($_GET['id']))

		{

		  $cab_id= $_GET['id'];;

		   

		  jk_delete_data(REGISTER,"id",$cab_id);

		  jk_redirect_success_url('Userview.php?success=Successfully Deleted');

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
      <label for="pwd">Start Date:</label>
      <input type="date" id="fdat" name="fdat" class="form-control" value="<?php echo $fdat; ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="pwd">End Date:</label>
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
              <h3 class="box-title">User View</h3>
            </div>
 <div class="text-right">
                     <a  href="Userview.php" class="btn btn-primary">Back </a>
					 </div>
            </div>
            <!-- /.box-header -->            <div class="box-body">								
			
							

  
			  
			  <div class="box-body table-responsive">

          <table id="example1" class="table datatable_full table-bordered table-striped">

            <thead>

              <tr>

                <th>SNo</th>
 <th>Date</th>

                <th>Type</th>
   <th>Name</th>
                <th>Mobileno</th>

             <th>Email</th>
			 <th>Register No</th>	

					 <th>Username</th>	
 <th>Password</th>	
 <th>Image</th>	


 

                <th>Action</th>

              </tr>

            </thead>

            <tbody>

              <?php 
			  
		

	$i=1;
	
	
										$arrCab =jk_select_data(REGISTER,$where);
//print_r($arrCab);


										 foreach($arrCab as $ep) {		

										

										 								?>

              <tr>

                   <td><?php echo $ep['sno'];?></td>

                <td><?php echo $ep['dat'];?></td>

             

     <td><?php echo $ep['typ'];?></td>
	  <td><?php echo $ep['name'];?></td>
	   <td><?php echo $ep['mno'];?></td>
	 <td><?php echo $ep['email'];?></td>
	<td><?php echo $ep['regno'];?></td>	
 <td><?php echo $ep['uname'];?></td>
  <td><?php echo $ep['pword'];?></td>
  <td><?php echo $ep['img'];?></td>
                          <td>

                      <a href="useredit.php?action=edit&sno=<?php echo $ep['sno'];?>"><span class="label label-info">EDIT</span></a> 

                <?php 

					?>
<a href="Userview.php?action=delete&id=<?php echo $ep['id'];?>" onClick="return confirm('are you sure want to delete?');"><span class="label label-warning">Delete</span></a>
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