<?php session_start(); ?>
<?php include("connection/config.php");
  if(@$_GET['action']=="delete" and isset($_GET['c_id']))

		{

		  $cabbooking_id= $_GET['c_id'];;

		   

		  jk_delete_data(GALLERY,"c_id",$cabbooking_id);

		  jk_redirect_success_url('imgadd.php?success=Successfully Deleted');

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
			 
						
	<form method="post" style="display:none" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group col-md-3">
      <label for="pwd">From:</label>
      <input type="date" id="startDate" name="startDate" class="form-control">
    </div>
    <div class="form-group col-md-3">
      <label for="pwd">To:</label>
      <input type="date" id="birthDate" name="birthDate" class="form-control">
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

              <h3 class="box-title">Gallery  Master</h3>
			  <div class="text-right">
                     <a  href="added.php" class="btn btn-primary">Add Data </a>&nbsp;&nbsp;<a href="master2.php" class="btn btn-primary">Back </a>
					 </div>
            </div>
			

            <!-- /.box-header -->            <div class="box-body">								
			
							

  
			  
			  <div class="box-body table-responsive">

          <table id="example1" class="table datatable_full table-bordered table-striped">

            <thead>

              <tr>

                <th>SNo</th>

                <th>Type</th>

                <th>Image</th>

   

                <th>Action</th>

              </tr>

            </thead>

            <tbody>

              <?php 



										$i=1;


$where	="where 1=1 ";
										$arrCab =jk_select_data(GALLERY,$where);
//print_r($arrCab);


										 foreach($arrCab as $ep) {		

										

										 								?>

              <tr>

                  <td data-label="Sno"><?php echo $ep['c_id'];?></td>

                <td data-label="Type"><?php echo $ep['type'];?></td>



  <td data-label="Image"><?php
         // $ext = pathinfo($ep['serviceimg'], PATHINFO_EXTENSION);
          $filename = $ep['serviceimg'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          $allowed = array('jpg','png','gif');
          if( ! in_array( $ext, $allowed ) ) 
            {echo '<a href="upload/'.$ep['serviceimg'].'">Document</a>';}
          else
          {
            echo '<a class="fancybox-buttons"  href="upload/'.$ep['serviceimg'].'">Document</a>';
          }
           ?></td>
 
   

                <td><a href="edited.php?action=edit&c_id=<?php echo $ep['c_id'];?>"><span class="label label-info">EDIT</span></a> 
                
                <?php 
					//$finline_no	= $ep['finline_no'];
					//$arrAcCheck =jk_select_data(GALLERY," where c_id = '$finline_no' LIMIT 1");
					
					if(empty($arrAcCheck)){?>
                <a href="imgadd.php?action=delete&c_id=<?php echo $ep['c_id'];?>" onclick="return confirm('are you sure want to delete?');"><span class="label label-warning">Delete</span></a>
                <?php }?>
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