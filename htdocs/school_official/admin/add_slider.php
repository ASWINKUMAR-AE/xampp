<?php include ('header.php'); 
error_reporting(0); 
session_start();
include("dbcon.php");
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
                                    <label class="control-label col-md-4" for="first-name"> Category <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
    <select name="gcategory" class="control-label" style="width: 100%;">
        <option value="">--Select--</option>
        <?php $galls=mysqli_query($conn,"SELECT * FROM `gallery_cat`");
    
        while($gallerys=mysqli_fetch_array($galls))
        {
            echo '<option value="'.$gallerys['gc_id'].'">'.$gallerys['gallery_cat_name'].'</option>';
        }
    ?>
        
    </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name"> Title <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="img_title" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Description
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="description" placeholder="" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
								 <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Type
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="img_type" placeholder="" id="first-name2" class="form-control col-md-7 col-xs-12">
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
                                        <input type="submit" name="submit" class="btn btn-success">
                                    </div>
                                </div>
                            </form>
<?php	
							


if(count($_POST) > 0)
{

    $errorflag=1;
    $gcategory=mysqli_escape_string(trim($_POST['gcategory']));
    $img_title=mysqli_escape_string(trim($_POST['img_title']));
    $img_type=mysqli_escape_string(trim($_POST['img_type']));
    $description=mysqli_escape_string(trim($_POST['description']));
   // $status=mysql_escape_string(trim($_POST['status']));
    
        
    $logoname=$_FILES['image']['name'];
    $logo='';
    if($logoname != '')
    {
    
        if($_FILES['image']['type'] != 'image/jpg' &&  $_FILES['image']['type'] != 'image/jpeg' && $_FILES['image']['type'] != 'image/gif' && $_FILES['image']['type'] != 'image/png')
        {
                $errorflag=0;
        }
        else
        {       
                $logo =date('YmdHis').'_'.$logoname;
                $img_path ='gallery/'.$logo;
                move_uploaded_file($_FILES['image']['tmp_name'],$img_path);
        }
    }
    

    $gcategory=mysqli_escape_string(trim($_POST['gcategory']));
    $img_title=mysqli_escape_string(trim($_POST['img_title']));
    $img_type=mysqli_escape_string(trim($_POST['img_type']));
    $description=mysqli_escape_string(trim($_POST['description']));
    
    
    
    if(intval($errorflag) > 0)
    {
                
        $sql="INSERT INTO slider SET 
        gcategory='".$gcategory."',
        img_title='".$img_title."',
        img_type='".$img_type."',
        description='".$description."',
        admin_image='".$logo."'";       
    
        if(mysql_query($sql))
        {
            $_SESSION['successmessage']='Listing order has been added successfully.';
            header('Location:add_slider.php');
            exit;
        }
        else
        {
            $_SESSION['errormessage']=mysql_error();
            header('Location:add_slider.php');
            exit;
        }
    }
    else
    {
        $_SESSION['errormessage']='Please enter valid data';
        header('Location:add_slider.php');
        exit;
    }
    
    
}

?>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>
</div>
