<?php include ('dbcon.php');
$ID=$_GET['ad_id'];
 ?>
<?php include ('header.php'); ?>

         <div class="right_col" role="main" style="min-height: 600px;"> 
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit AD Details</h2>
                        <ul class="nav navbar-right panel_toolbox">

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
<?php
  $query=mysql_query("select * from ads where ad_id='$ID'")or die(mysql_error());
$row=mysql_fetch_array($query);
  ?>

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">AD Image
                                    </label>
                                    <div class="col-md-4">
										<a href=""><?php if($row['ad'] != ""): ?>
										<img src="ads/<?php echo $row['ad']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php else: ?>
										<img src="images/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php endif; ?>
										</a>
                                        <input type="file" style="height:44px; margin-top:10px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">AD Url
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['ad_url']; ?>" name="ad_url" id="ad_url" class="form-control col-md-7 col-xs-12">
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
                                        <a href="ads.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
							
<?php
$id =$_GET['ad_id'];
if (isset($_POST['update'])) {
								$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];
							$error = $_FILES["image"] ["error"];
							


							if ($error > 0){
										
$ad_url = $_POST['ad_url'];
                 
                                

// $admin_type = $_POST['admin_type'];
$still_profile = $row['ad'];

$result=mysql_query("select * from ads") or die (mySQL_error());
$row=mysql_num_rows($result);


mysql_query(" UPDATE ads SET ad_url='$ad_url',  ad='$still_profile' WHERE ad_id = '$id' ")or die(mysql_error());
echo "<script>alert('Successfully Update AD Info!'); window.location='ads.php'</script>";	

									}else{
										if($size > 10000000) //conditions for the file
										{
										die("Format is not allowed or file size is too big!");
										}
										

move_uploaded_file($_FILES["image"]["tmp_name"],"ads/" . $_FILES["image"]["name"]);			
$profile=$_FILES["image"]["name"];

$ad_url = $_POST['ad_url'];
                                
// $admin_type = $_POST['admin_type'];

$result=mysql_query("select * from ads") or die (mySQL_error());
$row=mysql_num_rows($result);

	
mysql_query(" UPDATE ads SET ad_url='$ad_url', ad='$profile' WHERE ad_id = '$id' ")or die(mysql_error());
echo "<script>alert('Successfully Updated AD Info!'); window.location='ads.php'</script>";


}
}
?>
						
                        <!-- content ends here -->
                   
                </div>
            </div>
        </div>
             </div>
</div>
