<?php include ('header.php'); 

$did=$_GET['did'];
if($did!='')
{
$sql="delete from `gallery_cat` where `gc_id`='".$did."'";
if(mysqli_query($conn,$sql))
{
	 $_SESSION['successmessage']='One Record Has Been Deleted Successfully';
	 header('Location:gallery_category.php');
	 exit();
}
}

?>



 <div class="right_col" role="main" style="min-height: 600px;"> 
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                        <h2><i class="fa fa-info"></i>Gallery</h2>
                    
                    <php include(""); ?>
                        <ul class="nav navbar-right panel_toolbox">

                            <li>
							<a href="add_gallery_cat.php" style="background:none;">
							<button class="btn btn-primary"><i class="fa fa-plus"></i> Add Gallery Category</button>
							</a>
							</li>
				
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <!-- If needed 
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a></li>
                                    <li><a href="#">Settings 2</a></li>
                                </ul>
                            </li>
						-->
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                 	<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
									
									<th>Title</th>
                                    
								<!---	<th>User Type</th>	-->
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
								include ('dbcon.php');

							$result= mysqli_query($conn,"select * from gallery_cat order by gc_id DESC") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['gc_id'];
							?>
							<tr>
								
								<td style="word-wrap: break-word; width: 10em;"><?php echo $row['gallery_cat_name']; ?></td>
								
								<td>
									
									
									<a href="gallery_category.php?did=<?php echo $row['gc_id']; ?>">
										<i class="glyphicon glyphicon-trash" style="color:red;"></i>
									</a>
			
									<!-- delete modal admin -->
<div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Admin</h4>
										</div>
	<div class="modal-body">
	<div class="alert alert-danger">Are you sure you want to delete?</div>
<div class="modal-footer">
<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button><a href="gallery_category.php<?php echo '?gc_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
												</div>
										</div>
										</div>
									</div>
									</div>
								</td> 
							</tr>
							<?php } ?>
							</tbody>
							</table>
						</div>
                </div>
            </div>
        </div>
</div>
