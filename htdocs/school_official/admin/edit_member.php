<?php include ('dbcon.php');
$ID=$_GET['member_id'];
 ?>
<?php include ('header.php'); ?>

         <div class="right_col" role="main" style="min-height: 600px;"> 
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Member Details</h2>
                        <ul class="nav navbar-right panel_toolbox">

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
<?php
  $query=mysqli_query($conn,"select * from members where member_id='$ID'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Member Image
                                    </label>
                                    <div class="col-md-4">
										<a href=""><?php if($row['member_image'] != ""): ?>
										<img src="members/<?php echo $row['member_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php else: ?>
										<img src="images/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php endif; ?>
										</a>
                                        <input type="file" style="height:44px; margin-top:10px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Member Name
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['member_name']; ?>" name="member_name" id="member_name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Position
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['position']; ?>" name="position" id="position" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                
                        <!---        <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Admin Type <span class="required">*</span>
                                    </label>
									<div class="col-md-4">
                                        <select name="admin_type" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="<?php // echo $row['admin_type']; ?>"><?php // echo $row['admin_type']; ?></option>
											<option>Admin</option>
											<option>Encoder</option>
                                        </select>
                                    </div>
                                </div>	-->
                                <br/>
                                <div class="form-group" style="margin-top:2em;">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="members.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
							
<?php
$id =$_GET['member_id'];
if (isset($_POST['update'])) {
								$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];
							$error = $_FILES["image"] ["error"];
							


							if ($error > 0){
										
$member_name = $_POST['member_name'];

$position = $_POST['position'];                   
                                

// $admin_type = $_POST['admin_type'];
$still_profile = $row['member_image'];

$result=mysqli_query($conn,"select * from members") or die (mySQLi_error());
$row=mysqli_num_rows($result);


mysqli_query($conn," UPDATE members SET member_name='$member_name', position='$position',  member_image='$still_profile' WHERE member_id = '$id' ")or die(mysqli_error());
echo "<script>alert('Successfully Update Member Info!'); window.location='members.php'</script>";	

									}else{
										if($size > 10000000) //conditions for the file
										{
										die("Format is not allowed or file size is too big!");
										}
										

move_uploaded_file($_FILES["image"]["tmp_name"],"members/" . $_FILES["image"]["name"]);			
$profile=$_FILES["image"]["name"];

$member_name = $_POST['member_name'];
                                
// $admin_type = $_POST['admin_type'];
                                $position = $_POST['position'];  

$result=mysqli_query($conn,"select * from members") or die (mySQLi_error());
$row=mysqli_num_rows($result);

	
mysqli_query($conn," UPDATE members SET member_name='$member_name', position='$position', member_image='$profile' WHERE member_id = '$id' ")or die(mysqli_error());
echo "<script>alert('Successfully Updated Member Info!'); window.location='members.php'</script>";


}
}
?>
						
                        <!-- content ends here -->
                   
                </div>
            </div>
        </div>
             </div>
</div>
