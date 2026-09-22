<?php
error_reporting(0);
 include ('header.php'); ?>

       <div class="right_col" role="main" style="min-height: 600px;"> 
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                       
                    <h2>Add Admin</h2>
                 
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
                        <!-- content starts here required="required" -->

                            <form method="post" action="register_con.php" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Name 
                                    </label>
                                    <div class="col-md-3">
                                        
                                        <input class="form-control col-md-7 col-xs-12" type="text" name="name" id="name" required="required" placeholder="Username">
                                    </div>
                                </div>
                                
								 <div class="form-group">
                                    <label class="control-label col-md-4" for="password">Password
                                    </label>
                                    <div class="col-md-3">
                                        <input type="password" name="pass" placeholder="Password" id="pass" required="required"  class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                
                               
                               
                               <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Email 
                                    </label>
                                    <div class="col-md-3">
                                        
                                        <input class="form-control col-md-7 col-xs-12" type="email" name="email" id="email" required="required" placeholder="Email Address">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Mobile No 
                                    </label>
                                    <div class="col-md-3">
                                        
                                        <input class="form-control col-md-7 col-xs-12" type="text" name="mob" id="mob" required="required" placeholder="Mobile No">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Addess 
                                    </label>
                                    <div class="col-md-3">
                                        
                                     
										 <textarea class="form-control col-md-7 col-xs-12" name="addr" id="addr" placeholder="Addess" required="required"></textarea>
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
                                        <a href="home.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Register </button>
                                    </div>
                                </div>
                            </form>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>
</div>
