<?php include ('header.php'); 
error_reporting(0); 
session_start();

?>

       <div class="right_col" role="main" style="min-height: 600px;"> 
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                       
                    <h2>Add Gallery</h2>
                 
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
                                
                        <!---        <div class="form-group">
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
                                    <label class="control-label col-md-4" for="first-name"> Title <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="titleone" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Description
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="descp" placeholder="" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
								 <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Type
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="titletwo" placeholder="" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name"> Image
                                    </label>
                                    <div class="col-md-4">
                                        <input type="file" style="height:44px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="slider.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
							
							<?php	
							$titletwo = $_POST['titletwo'];
							$directoryName = './'.$titletwo;
 
//Check if the directory already exists.
if(!is_dir($directoryName)){
    //Directory does not exist, so lets create it.
    mkdir($directoryName, 0755, true);
}
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

									move_uploaded_file($_FILES["image"]["tmp_name"],$titletwo."/" . $_FILES["image"]["name"]);			
									$profile=$_FILES["image"]["name"];
									$titleone = $_POST['titleone'];
									
									$descp = $_POST['descp'];
									
							//		$admin_type = $_POST['admin_type'];
					
					
							
						mysql_query("insert into slider (admin_image,img_title,img_type,description)
						values ('$profile','$titleone', '$titletwo','$descp' )")or die(mysql_error());
						
						
						mysql_query("delete from animateslider where img_typ= '$titletwo'")or die(mysql_error());
						
						
						mysql_query("insert into animateslider (img_typ,tmpimg,st)
						values ( '$titletwo','$profile','1' )")or die(mysql_error());
						
						
						echo "<script>alert(' successfully added!'); window.location='slider.php'</script>";
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
