<?php
session_start();
?>

<?php include("connection/config.php");

  if(isset($_POST['btnUpdate']))

      {
	  $id=$_POST['id'];

  

     	$datas = array_filter($_POST);

	 

      $insertRoute = jk_update_data(HWORK,$datas,"id","$id");

	  

      if($insertRoute)

      {

		       jk_redirect_success_url('studentmasterreport.php?success=Record Edited successfully.!');

      }

      
	  }

	   if(@$_GET['action']=="edit" and isset($_GET['id']))

    {

      $id=$_GET['id'];

      $school_details=jk_select_data(HWORK,"where id='$id'");

     extract($school_details[0]);

     

      }


?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include("header.php"); ?>
<?php include("slide.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header
	 (Page header) -->
	 <section class="content-header">
  
<h1>
        Dashboard
        <small>Control panel</small>
		</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
      
	   <form class="row g-3" method="post" action="">
	   <div class="col-md-6">
    <label for="inputEmail4" class="form-label">sno</label>
    <input type="text" class="form-control" id="id" name="id" placeholder="" value="<?php echo $id;?>">
  </div>
  <div class="col-md-6 col-sm-6 col-xs-12">
   <label for="inputPassword4" class="form-label">Date</label>
                      <input  class="form-control "   name="date" id="date" placeholder="Date" required="required" type="date" value="<?php echo $date;?>">
                        </div>
						<div class="col-md-6 col-sm-6 col-xs-12">
   <label for="inputPassword4" class="form-label">Student Name</label>
                      <input  class="form-control " id="studentname"   name="name" id="name" placeholder="Student Name" required="required" type="text" value="<?php echo $name;?>">
                        </div>
						 <div class="col-md-6 col-sm-6 col-xs-12">
   <label for="inputPassword4" class="form-label">Regno</label>
                      <input  class="form-control "   name="regno" id="regno" placeholder="Register no" required="required" type="text" value="<?php echo $regno;?>">
                        </div>
						 <div class="col-md-6 col-sm-6 col-xs-12">
   <label for="inputPassword4" class="form-label">Center name</label>
                      <input  class="form-control "   name="center" id="center" placeholder="Register no" required="required" type="text" value="<?php echo $center;?>">
                        </div>
  
  
	   <h3><strong> 1. Speed writing                </strong>                  </h3>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">DirectView</label>
    <input type="text" class="form-control" id="dview" name="dview" placeholder="" value="<?php echo $dview;?>">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">IndirectView</label>
    <input type="text" class="form-control" id="indview" name="indview" placeholder="" value="<?php echo $indview; ?>">
  </div>
  <div class="col-md-6">
    <label for="inputAddress" class="form-label">Left/Right  Hand Writing</label>
    <input type="text" class="form-control" id="irhw" name="irhw" placeholder="" value="<?php echo $irhw; ?>" >
  </div>
  
  
   <h3><strong>2.Page Work Done in class</strong>:</h3>
   <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Book</label>
    <input type="text" class="form-control" id="pbook" name="pbook" placeholder="" value="<?php echo $pbook; ?>">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">PageNo</label>
    <input type="text" class="form-control" id="ppageno" name="ppageno" placeholder="" value="<?php echo $ppageno; ?>">
  </div>
  
    <h3><strong>3.Today Homework Pages: </strong></h3>
	<div class="col-md-6">
    <label for="inputEmail4" class="form-label">Book</label>
    <input type="text" class="form-control" id="tbook" name="tbook" placeholder="" value="<?php echo $tbook; ?>">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">PageNo</label>
    <input type="text" class="form-control" id="tpageno" name="tpageno" placeholder="" value="<?php echo $tpageno; ?>">
  </div>
  
   <h3><strong>4.Fingering Pratices: </strong></h3>
   <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Movers</label>
    <input type="text" class="form-control" id="mover" name="mover" placeholder="" value="<?php echo $mover; ?>">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Raiders</label>
    <input type="text" class="form-control" id="raider" name="raider" placeholder="" value="<?php echo $raider; ?>">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Flyers</label>
    <input type="text" class="form-control" id="flyer" name="flyer" placeholder="" value="<?php echo $flyer; ?>">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Endeavfiours</label>
    <input type="text" class="form-control" id="ende" name="ende" placeholder="" value="<?php echo $ende; ?>">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Archives</label>
    <input type="text" class="form-control" id="archi" name="archi" placeholder="" value="<?php echo $archi; ?>">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Starts</label>
    <input type="text" class="form-control" id="start" name="start" placeholder="" value="<?php echo $start; ?>">
  </div>
  
  <div class="col-md-6 col-sm-6 col-xs-12">
   <label for="inputPassword4" class="form-label">Today Activity</label>
                      <input  class="form-control "   name="activity" id="activity" placeholder="Today Activity" value="<?php echo $activity;?>" required="required" type="text">
                        </div>
  <form id="form1" name="form1" method="post" action="">
                                                        <label for="Submit"></label>
                                                        
														     <input type="submit" name="btnUpdate" value="Apply Modify" class="btn btn-primary">	
    </form>
         </form>                                             <p>&nbsp;    </p>
  </div>
                                                </div>
											    </div>
												</div>  
												
    
      
           
               	 
                  </div>
       
        <!-- ./col -->
      
        <!-- ./col -->
      </div>
      <!-- /.row -->
    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include("footer.php"); ?>