<?php include ('header.php'); ?>

       <div class="right_col" role="main" style="min-height: 600px;"> 
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                       
                    <h2>Add Event Details</h2>
                 
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
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Event Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="packagename" id="packagename" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                
								 <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Description
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="duration" placeholder="" id="duration" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                
                               
                               
                               
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
                               
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="events.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
							
							<?php	
							include ('dbcon.php');
							if (isset($_POST['packagename'])  ) {
							{

									$packagename = $_POST['packagename'];
                                    $duration = $_POST['duration'];
									
							//		$admin_type = $_POST['admin_type'];
					
					$result=mysql_query("select * from events WHERE event_name='$packagename' ") or die (mySQL_error());
					$row=mysql_num_rows($result);
					if ($row > 0)
					{
					echo "<script>alert('Event name already taken!'); window.location='addevent_name.php'</script>";
					}
					else
					{		
						mysql_query("insert into events (event_name,des)
						values ('$packagename', '$duration')")or die(mysql_error());
						echo "<script>alert('Event successfully added!'); window.location='events.php'</script>";
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
