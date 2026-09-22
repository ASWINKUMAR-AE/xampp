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
              <h3 class="box-title">Student Upload Master </h3>
			  
            </div>

                   <div class="card-body rounded-0">
                <div class="container-fluid">
                <form action="import_csv.php" id="import-form" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                    <label for="fileData" class="form-label">Browse CSV Data</label>
                    <input class="form-control" type="file" accept=".csv" name="fileData" id="fileData" required>
                    </div>
                </form><br><br>
				 <div class="card-footer py-1">
                <div class="text-center">
                <button class="btn btn-primary rounded-pill" form="import-form" style="position: absolute;right: 50px;">Import</button>
                <a  href="master.php" class="btn btn-primary" style="position: absolute;right: 120px;">Back </a>
                </div>
            </div>
                </div>
            </div><br><br>
           
            </div>
            <div class="card my-2 rounded-0">
            <div class="card-header rounded-0">
                <div class="card-title"><b>Member List</b></div>
            </div>
            <div class="card-body rounded-0">
                <div class="container-fluid">
                <div class="table-responsive">
                    <table class="table table-hovered table-striped table-bordered">
                    <thead>
                        <tr class="bg-gradient bg-primary text-white">
                        <th class="text-center">Id</th>
                        <th class="text-center">Student Name</th>
                        <th class="text-center">date</th>
						<th class="text-center">reg no</th>
						<th class="text-center">D.O.B</th>
						<th class="text-center">Student aadhar no</th>
						<th class="text-center">student address</th>
						<th class="text-center">blood group</th>
						<th class="text-center">nation</th>
						<th class="text-center">school</th>
						<th class="text-center">father name</th>
						<th class="text-center">father dob</th>
						<th class="text-center">proffession</th>
						<th class="text-center">father aadhar no</th>
						<th class="text-center">mobile no</th>
						<th class="text-center">email</th>
						<th class="text-center">education</th>
						<th class="text-center">date</th>
						<th class="text-center">mother name</th>
						<th class="text-center">mother dob</th>
						<th class="text-center">proffession</th>
						<th class="text-center">mother aadhar no</th>
						<th class="text-center">mobile no</th>
						<th class="text-center">email</th>
						<th class="text-center">guardian name</th>
						<th class="text-center">g dob</th>
						<th class="text-center">g mno</th>
						<th class="text-center">c name</th>
						<th class="text-center">c regno</th>
						<th class="text-center">p regno</th>
						<th class="text-center">nott</th>
						
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once('config.php');
                        $members_sql = "SELECT * FROM `student` order by id ASC";
                        $members_qry = $conn->query($members_sql);
                        if($members_qry->num_rows > 0):
                        while($row = $members_qry->fetch_assoc()):
                        ?>
                        <tr>
                            <th class="text-center"><?= $row['id'] ?></th>
                            <td><?= $row['sname'] ?></td>
                            <td><?= $row['date'] ?></td>
							<td><?= $row['srno'] ?></td>
                            <td><?= $row['sdob'] ?></td>
							<td><?= $row['sanum'] ?></td>
                            <td><?= $row['saddress'] ?></td>
							<td><?= $row['sbgroup'] ?></td>
                            <td><?= $row['snation'] ?></td>
							<td><?= $row['sschool'] ?></td>
                            <td><?= $row['fname'] ?></td>
							<td><?= $row['fdob'] ?></td>
                            <td><?= $row['fprof'] ?></td>
                             <td><?= $row['fanum'] ?></td>
                            <td><?= $row['fmno'] ?></td>
							<td><?= $row['femail'] ?></td>
                            <td><?= $row['fedu'] ?></td>
							<td><?= $row['fadate'] ?></td>
                            <td><?= $row['mnme'] ?></td>
							<td><?= $row['mdob'] ?></td>
                            <td><?= $row['mprof'] ?></td>
							<td><?= $row['mano'] ?></td>
                            <td><?= $row['mmno'] ?></td>
							<td><?= $row['memail'] ?></td>
                            <td><?= $row['gname'] ?></td>
							<td><?= $row['gdob'] ?></td>
							<td><?= $row['gmno'] ?></td>
							<td><?= $row['cname'] ?></td>
							<td><?= $row['cregno'] ?></td>
							<td><?= $row['pregno'] ?></td>
							<td><?= $row['nott'] ?></td>
                        </tr>
                        <?php endwhile; ?>
                        <?php else: ?>
                        <tr>
                            <th class="text-center" colspan="31">No data on the database yet.</th>
                        </tr>
                        <?php endif; ?>
                        <?php $conn->close() ?>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
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