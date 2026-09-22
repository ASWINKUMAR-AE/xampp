<?php include ('header.php'); ?>

       <div class="right_col" role="main" style="min-height: 600px;"> 
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                       
                    <h2>Add Gallery Category Details</h2>
                 
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
                                    <label class="control-label col-md-4" for="first-name">Category Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="categoryname" id="categoryname" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                
                                 
                               
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="gallery_category.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
                            
                            <?php   
                            include ('dbcon.php');
                            if (isset($_POST['categoryname'])  ) {
                            {
                              $categoryname = $_POST['categoryname'];              
                            
                    
                    $result=mysql_query("select * from gallery_cat WHERE gallery_cat_name='$categoryname' ") or die (mySQL_error());
                    $row=mysql_num_rows($result);
                    if ($row > 0)
                    {
                    echo "<script>alert('Category name already taken!'); window.location='add_gallery_cat.php'</script>";
                    }
                    else
                    {       
                        mysql_query("insert into gallery_cat (gallery_cat_name)
                        values ('$categoryname')")or die(mysql_error());
                        echo "<script>alert('Category successfully added!'); window.location='gallery_category.php'</script>";
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
