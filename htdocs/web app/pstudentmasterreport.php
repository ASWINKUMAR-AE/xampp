<?php session_start(); ?>

<?php include("connection/config.php");
  if(@$_GET['action']=="delete" and isset($_GET['id']))

		{

		  $cab_id= $_GET['id'];;

		   

		  jk_delete_data(HWORK,"id",$cab_id);

		  jk_redirect_success_url('STUDENTMASTERREPORT.php?success=Successfully Deleted');

		}

?>
 <?php include("header1.php"); ?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php include("slide.php"); ?>
 <?php include("slide1.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <style type="text/css">
<!--
.style1 {color: #000000}
-->
  </style>
  
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
              <h3 class="box-title">Student Master Report</h3>
			   <div class="text-right">
                    <a href="master2.php" class="btn btn-primary">Back </a>
					 </div>
            </div>

            </div>
            <!-- /.box-header -->            <div class="box-body">								
			
							

  
			  
			  <div class="box-body table-responsive">
			  <?php
$fdd=$_SESSION['SESS_LAST_NAMEE'];
if(isset($_POST['search'])){
$fdat=$_POST['fdat'];
$tdat=$_POST['tdat'];
$result = mysqli_query($CN, "SELECT  sa_id,sname,serialno,date1,attendence,speed_write,speed_write1,speed_write2,work_in_class,work_in_class1,homework,homework1,homework2,handw1,handw2,notes,fingering,today_activity FROM stud_attendance where date BETWEEN '$fdat' AND '$tdat'");
}else{
$result = mysqli_query($CN, "SELECT  sa_id,sname,serialno,date1,attendence,speed_write,speed_write1,speed_write2,work_in_class,work_in_class1,homework,homework1,homework2,handw1,handw2,notes,fingering,today_activity FROM stud_attendance where serialno='$fdd' ");
}
  
 
 ?>


          <table id="example1" class="table datatable_full table-bordered table-striped">

        
 <tr>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th colspan="3" style="color:#FFFF00"><center>
                  <span class="style1">Speed Writing</span>
                </center> </th>
                <th colspan="2" bordercolor="#FFFF00" style="color:#FFFF00"><span class="style1">Page work in class </span></th>
                <th colspan="2" bordercolor="#FFFF00" style="color:#FFFF00"><span class="style1">Today home work pages </span></th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
              <tr>
              <tr>

               <th>SNo</th>

<th>Name</th>
<th>Register No</th>
<th>Date</th>
<th>Attendance</th>


                <th>Direct View</th>
	
				<th>InDirect View</th>
			
				<th>Left/Right H/W</th>
				
   <th>Book A/B</th>
     <th>Page No</th>          
<th>Book A/B</th>

     <th>Page No</th>

<th>Fingering</th>
<th>Today Activity</th>
<th>Notes</th>
              </tr>

  
            <tbody>

              <?php
      if( mysqli_num_rows( $result )==0 ){
	  $s=0;
        echo '<tr><td align="center" colspan="19"> No Rows Returned </td></tr>';
      }else{
		  $s=0;
        while( $row = mysqli_fetch_assoc( $result ) ){
			$s=$s+$row['sa_id'];
          echo "<tr>
    
<td data-label='id'>{$row['sa_id']}</td>
<td data-label='Name'>{$row['sname']}</td>
<td data-label='Name'>{$row['serialno']}</td>
<td data-label='Date'>{$row['date1']}</td>
	      <td data-label='Attendance'>{$row['attendence']}</td>
  <td data-label='Center Name'>{$row['speed_write']}.{$row['speed_write1']}</td>
	      
		  <td data-label='Direct View'>{$row['speed_write2']}.{$row['work_in_class']}</td>

<td data-label='Left/Right Hand Writing'>{$row['work_in_class1']}.{$row['homework1']}</td>

	      <td data-label='Book'>{$row['homework']}</td>
  <td data-label='Page No'>{$row['homework2']}</td>
  
  <td data-label='Book'>{$row['handw1']}</td>
<td data-label='Page No'>{$row['handw2']}</td>

	      <td data-label='Raiders'>{$row['fingering']}</td>
  <td data-label='Flyers'>{$row['today_activity']}</td>
	     <td data-label='Movers'>{$row['notes']}</td>
	     
	      
	
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