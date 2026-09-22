<?php session_start();

include("connection/config.php");

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
				
					$where	.=" and date between  '$fdat' and  '$tdat' ";
				}
				
				if(isset($_POST['des'])){
					
					$des=$_POST['des'];
					//$td=$_POST['tdat'];
				
					$where	.=" and des =  '$des'";
				}
		
		?>	 
			 
					
	<form method="post " style="display:none" action="">
	
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
              <h3 class="box-title">Center Master</h3>
		                <div class="btn-group pull-right">
						&nbsp;&nbsp;<a href="master1.php" class="btn btn-primary">Back </a>


</div>
            </div>
			 

            <!-- /.box-header -->            <div class="box-body">								
			
							

  
			  
			  <div class="box-body table-responsive">
			  
			  <?php
$fdd=$_SESSION['SESS_LAST_NAMEE'];
if(isset($_POST['search'])){
$fdat=$_POST['fdat'];
$tdat=$_POST['tdat'];
$result = mysqli_query($CN, "SELECT id,dat,cregno,centername,tutorname,mobileno FROM tutor where dat BETWEEN '$fdat' AND '$tdat'");
}else{
$result = mysqli_query($CN, "SELECT id,dat,cregno,centername,tutorname,mobileno FROM tutor where cregno='$fdd'");
}
  
 
 ?>

          <table id="example1"  class="table datatable_full table-bordered table-striped">

            <thead>

              <tr>
<th >Sno</th>
<th >Date</th>
<th >Regno</th>
<th >Center Name</th>
 
 <th>Tutor Name</th>

                <th >Mobileno</th>

                
                
									       
											       

        

              </tr>

            </thead>

            <tbody>

              <?php
      if( mysqli_num_rows( $result )==0 ){
	  $s=0;
        echo '<tr><td align="center" colspan="4"> No Rows Returned </td></tr>';
      }else{
		  $s=0;
		  	
        while( $row = mysqli_fetch_assoc( $result ) ){

		
			$s=$s+$row['id'];
          echo "<tr>
    
<td data-label='Sno' >{$row['id']}</td>
<td data-label='Date'>{$row['dat']}</td>
<td data-label='Regno'>{$row['cregno']}</td>
<td data-label='Center Name'>{$row['centername']}</td>
	      <td data-label='Tutor Name'>{$row['tutorname']}</td>
  <td data-label='Mobile No'>{$row['mobileno']}</td>
	      
	
		  </tr>\n";
	
				
                       }
      }
    ?>

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
  
 <?php include("footer.php"); ?>
  <!-- /.content-wrapper -->
