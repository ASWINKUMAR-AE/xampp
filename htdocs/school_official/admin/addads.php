<?php include ('header.php'); ?>

       <div class="right_col" role="main" style="min-height: 600px;"> 
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                       
                    <h2>Add Ad Details</h2>
                 
                        <ul class="nav navbar-right panel_toolbox">
                           
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
                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                                           
							    <!---   <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">First Image
                                    </label>
                                    <div class="col-md-4">
                                        <input type="file" style="height:44px;" name="image1" id="image1" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Second Image
                                    </label>
                                    <div class="col-md-4">
                                        <input type="file" style="height:44px;" name="image2" id="image2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div> -->
								<div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Ad Url
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="membername" id="membername" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>                    
                           <!--    <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Admin Type <span class="required">*</span>
                                    </label>
									<div class="col-md-4">
                                        <select name="admin_type" class="select2_single form-control" required="required" tabindex="-1" >
											<option>Admin</option>
											<option>Encoder</option>
                                        </select>
                                    </div>
                                </div>	-->
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Ad Image
                                    </label>
                                    <div class="col-md-4">
                                        <input type="file" style="height:44px;" name="image" id="image" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="ads.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
							
							<?php	
							include ('dbcon.php');
							if (!isset($_FILES['image']['tmp_name'])) {
							echo "";
							}else{
							$file=$_FILES['image']['tmp_name'];
							$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];
							$error = $_FILES["image"] ["error"];
							{
										if($size > 10000000) //conditions for the file
										{
										die("Format is not allowed or file size is too big!");
										}
										
									else
										{

									move_uploaded_file($_FILES["image"]["tmp_name"],"ads/" . $_FILES["image"]["name"]);			
									$profile=$_FILES["image"]["name"];
									$membername = $_POST['membername'];
                                    
									
							//		$admin_type = $_POST['admin_type'];
					
							
						mysql_query("insert into ads (ad_url,ad)
						values ('$membername',  '$profile')")or die(mysql_error());
						echo "<script>alert('AD successfully added!'); window.location='ads.php'</script>";
					
									}
									}
							}
							
								?>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>
</div>
