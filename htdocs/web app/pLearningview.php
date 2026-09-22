<?php session_start(); ?>
<?php include("connection/config.php");
  if(@$_GET['action']=="delete" and isset($_GET['id']))

		{

		  $cab_id= $_GET['id'];;

		   

		  jk_delete_data(LEARNING,"id",$cab_id);

		  jk_redirect_success_url('Learningview.php?success=Successfully Deleted');

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
              <h3 class="box-title">Tutor's Learning Centre</h3>
			    <div class="text-right">
                    <a href="master2.php" class="btn btn-primary">Back </a>
					 </div>
            </div>

            </div>
            <!-- /.box-header -->            <div class="box-body">								
			
							

  
			  
			  <div class="box-body table-responsive">

          <table id="example1" class="table datatable_full table-bordered table-striped">

            <thead>

              <tr>

                <th>SNo</th>
 <th>Date</th>
<th>Learning Name</th>
                <th>Topic</th>
   
                <th>File Upload</th>

            
												          

              

              </tr>

            </thead>

            <tbody>

              <?php 
			  
		

	$i=1;
	
	
										$arrCab =jk_select_data(LEARNING,$where);
//print_r($arrCab);


										 foreach($arrCab as $ep) {		

										

										 								?>

              <tr>
    <td data-label="Sno"><?php echo $ep['sno'];?></td>

                <td data-label="Date"><?php echo $ep['dat'];?></td>

             

     <td data-label="Subject"><?php echo $ep['lname'];?></td>
	  <td data-label="Description"><?php echo $ep['subj'];?></td>
	   <td data-label="Image">

      <?php
         // $ext = pathinfo($ep['serviceimg'], PATHINFO_EXTENSION);
          $filename = $ep['img'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          $allowed = array('jpg','png','gif');
          if( ! in_array( $ext, $allowed ) ) 
            {echo '<a href="learning/'.$ep['img'].'">Document</a>';}
          else
          {
            echo '<a class="fancybox-buttons"  href="learning/'.$ep['img'].'">'.$ep['img'].'</a>';
          }
           ?>
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