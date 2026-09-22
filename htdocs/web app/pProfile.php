<?php
  session_start();
  include("connection/config.php");  
  //echo $_SESSION["SESS_LAST_NAMEE"];

  $website_data=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `register` 
    WHERE regno='".$_SESSION["SESS_LAST_NAMEE"]."'")); 

 if(count($_POST) > 0)
  {       
    $regno=trim($_POST['regno']);
    $name=trim($_POST['name']);
    $mno=trim($_POST['mno']);       
    
  $logoname=$_FILES['image']['img'];
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
        $img_path ='upload/'.$logo;
        if(move_uploaded_file($_FILES['image']['tmp_name'],$img_path))
        {
          $sql="UPDATE `register` SET img='".$logo."' WHERE id='".$website_data['id']."'";
          mysqli_query($db,$sql);          
        }        
    }
  
  }          
        $sqls="UPDATE `register` SET 
        `regno`='".$regno."',
        `name`='".$name."',
        `mno`='".$mno."' WHERE id='".$website_data['id']."'";        
        
        
    if(mysqli_query($db,$sqls))
    {    
      $_SESSION['successmessage']='Updated successfully.';
      header('Location:Profile.php?id='.$website_data['id']);
      exit;    
    }        
      
    else
    {
      $_SESSION['errormessage']='Please enter your valid data...';
      header('Location:Profile.php?id='.$website_data['id']);
      exit();
    }
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
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">

              <h3 class="box-title">My Profile</h3>
			     <div class="text-right">
                    <a href="master2.php" class="btn btn-primary">Back </a>
					 </div>
		
            </div>
			
					   <form id="signupform" method="post"  class="form-horizontal" role="form" enctype="multipart/form-data">
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Regno <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="regno" value="<?php echo $website_data['regno']; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  name="regno" placeholder="" required="required" type="text">
                        </div>
                      </div>
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="regno" value="<?php echo $website_data['typ']; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  name="regno" placeholder="" required="required" type="text">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="type" value="<?php echo $website_data['name']; ?>"  class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="" required="required" type="text">
                        </div>
						
                      </div>
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Mobile No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="mno" value="<?php echo $website_data['mno']; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="mno" placeholder="" required="required" type="text">
                        </div>
						
                      </div>
					     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="mno" value="<?php echo $website_data['email']; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="mno" placeholder="" required="required" type="text">
                        </div>
						
                      </div>
					     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="mno" value="<?php echo $website_data['uname']; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="mno" placeholder="" required="required" type="text">
                        </div>
						
                      </div>
					     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="mno" value="<?php echo $website_data['pword']; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="mno" placeholder="" required="required" type="text">
                        </div>
						
                      </div>
					    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Mobile No">Image<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="file" id="image"  class="form-control col-md-4 col-xs-4" data-validate-length-range="6" data-validate-words="2" name="image" placeholder="">
        <img src="upload/12.jpg"  width="100px" height="100px"  style="border:4px groove #CCCCCC; border-radius:5px;">
                        </div>
						
                      </div>
					    
                     
                  
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset" class="btn btn-primary">Cancel</button>
                          <input type="submit" id="send"  class="btn btn-danger" value="Submit">
                        </div>
                      </div>
                   </form>
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