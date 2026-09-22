<?php session_start(); ?>
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
				
					$where	.=" and date between  '$fdat' and  '$tdat' ";
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
              <h3 class="box-title">Tutor Student  List</h3>
			   <div class="text-right">
                    <a href="master1.php" class="btn btn-primary">Back </a>
					 </div>
            </div>

            <!-- /.box-header -->            <div class="box-body">								
			
							

  
			  
			  <div class="box-body table-responsive">
			  
			  <?php
$fdd=$_SESSION['SESS_LAST_NAMEE'];
if(isset($_POST['search'])){
$fdat=$_POST['fdat'];
$tdat=$_POST['tdat'];
$result = mysqli_query($CN, "SELECT id,cregno,cname,sname,date,sdob,sanum,saddress,sbgroup,snation,sschool FROM student where date BETWEEN '$fdat' AND '$tdat'");
}else{
$result = mysqli_query($CN, "SELECT id,cregno,cname,sname,date,sdob,sanum,saddress,sbgroup,snation,sschool FROM student where cregno='$fdd'");
}
  
 
 ?>

          <table id="example1" class="table datatable_full table-bordered table-striped">

            <thead>

              <tr>
<th>Id</th>
	<th>Date</th>
 <th>Reg.No</th>
  <th>Center Name</th>
                <th>Student Name</th>
				
			

          

                <th>D.O.B</th>

                <th>Aadhar Number</th>
				       <th>Address</th>
					          <th>Blood Group</th>
							         <th>Nationality</th>
									        <th>School</th>
											          

               

              </tr>

            </thead>

            <tbody>

              <?php
      if( mysqli_num_rows( $result )==0 ){
	  $s=0;
        echo '<tr><td align="center" colspan="11"> No Rows Returned </td></tr>';
      }else{
		  $s=0;
        while( $row = mysqli_fetch_assoc( $result ) ){
			$s=$s+$row['cregno'];
          echo "<tr>
    
<td data-label='Id'>{$row['id']}</td>
<td data-label='Date'>{$row['date']}</td>
<td data-label='Reg No'>{$row['cregno']}</td>
  <td data-label='Center Name'>{$row['cname']}</td>
<td data-label='Student Name'>{$row['sname']}</td>

	      
  <td data-label='D.O.B'>{$row['sdob']}</td>
  
  <td data-label='Aadhar Number'>{$row['sanum']}</td>
<td data-label='Address'>{$row['saddress']}</td>
<td data-label='Blood Group'>{$row['sbgroup']}</td>
	      <td data-label='Nationality'>{$row['snation']}</td>
  <td data-label='School'>{$row['sschool']}</td>
	    
	
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
  <!-- /.content-wrapper -->
  <?php include("footer.php"); ?>