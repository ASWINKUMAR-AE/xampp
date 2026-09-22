<?php session_start(); ?>
<?php include("connection/config.php");


$index_no_redirect =1;


if(isset($_POST['btnAdd']) || isset($_GET['gallery_name']))

  {
     $datas = array_filter($_POST);

	 

	 $datas['gallery_name'] = strtoupper($datas['gallery_name']);

	 $datas['type'] = $METHODSESSION_TOKEN;
	 
	 $datas['branch'] = BRANCH;

      $datas['date_of_create'] = jk_mysql_datetime();
	  
	  
	  $FIN_MODE=jk_select_data(FIN_MODE);
	  
	  foreach($FIN_MODE as $arrFM){
			$datas['type'] = $arrFM['fin_mode_name'];
			$insertRoute = jk_insert_data(GALLERY,$datas);
	  }
	  //$datas['type'] = 'seettu';
	  //$insertRoute = jk_insert_data(GALLERY,$datas);

      if($insertRoute)
      {
      if(isset($_POST['btnAdd_New'])){

      jk_redirect_success_url('gallery.php?success=Finline added successfully.!');}

      else{

      jk_redirect_success_url('gallery.php?success=Finline added successfully.!');

      }

      }

      else

      {

         // pg_query("ROLLBACK");

          $_GET['error']= $insertRoute;

          extract($_POST);

      }

      

     

      }

	  //update

	   if(isset($_POST['btnUpdate']))

      {
	  $c_id=$_POST['c_id'];

  

     $datas = array_filter($_POST);

	  $datas['gallery_name'] = strtoupper($datas['gallery_name']);

	 $datas['type'] = $METHODSESSION_TOKEN;

      $datas['date_of_create'] = jk_mysql_datetime();

      $insertRoute = jk_update_data(GALLERY,$datas,"c_id","$c_id");

	  

      if($insertRoute)

      {

		       jk_redirect_success_url('gallery.php?success=Finline Edited successfully.!');

      }

      else

      {

         // pg_query("ROLLBACK");

          $FormResponse= jk_form_error($insertRoute);

          extract($_POST);

      }
	  }

	   if(@$_GET['action']=="edit" and isset($_GET['c_id']))

    {

      $c_id=$_GET['c_id'];

      $school_details=jk_select_data(GALLERY,"where c_id='$c_id'");

     extract($school_details[0]);

     

      }

	   if(@$_GET['action']=="delete" and isset($_GET['c_id']))

		{

		  $c_id= $_GET['c_id'];;

		   

		  jk_delete_data(GALLERY,"c_id",$c_id);

		  jk_redirect_success_url('gallery.php?success=Successfully Deleted');

		}

	  

 $page_name = 'gallery';

//include(ADMININC."meta_header.php");

//echo strtoupper('karthi');

?>

<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-body pad table-responsive">
        <div class="box-header with-border">
          <h3 class="box-title">Add Line Details </h3>
        </div>
        <form id="form1" name="form1" class="form-horizontal"  autocomplete="off" method="post" action="" data-toggle="validator" novalidate>
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-4 control-label" >Line No. <span style="color:red">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" minlength="1" name="gallery_no" id="gallery_no" value="<?php echo $gallery_no?>" readonly required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label" >Name <span style="color:red">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" minlength="1" name="gallery_name" id="gallery_name" value="<?php echo $gallery_name?>" required>
              </div>
            </div>
           
              <div class="form-group">
                <label class="col-sm-4 control-label" >Branch <span style="color:red">*</span></label>
                 <div class="col-md-8">
                <select id="branches_no" name="branches_no" class="form-control select2">
                  <option value="">Select</option>
                  <?php 

$role_details=jk_select_data(BRANCHES,"ORDER BY branches_name ASC");

foreach($role_details as $role_detail)

{



?>
                  <option value="<?php echo $role_detail['branches_no']?>" <?php if($role_detail['branches_no']==BRANCH){ ?>selected<?php } ?>><?php echo $role_detail['branches_no']?> - <?php echo $role_detail['branches_name']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <div class="pull-right"> <a href="">
              <input type="button" class="btn btn-danger " value="Cancel">
              </a>
              <?php if(@$_GET['action']=="edit" and isset($_GET['c_id'])) { ?>
              <input type="hidden" name="c_id" id="c_id" value="<?php echo @$_GET['c_id']?>" />
              <input type="submit" name="btnUpdate" class="btn btn-primary" value="Update" >
              <?php } else { ?>
              <input type="submit" id="add" name="btnAdd" class="btn btn-primary" value="Save">
              <?php } ?>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-body pad table-responsive">
        <div class="box-header with-border">
          <h3 class="box-title Fu">Finline List</h3>
        </div>
        <div class="box-body table-responsive">
          <table id="example1" class="table datatable_full table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Finline No.</th>
                <th>Name</th>
                <th>Branch</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 

										$i=1;

										$emp =jk_select_data(GALLERY,"order by c_id DESC");

										 foreach($emp as $ep) {		
										 //$branches_no 	=	 $ep['branch'];
										// $branch		=	jk_select_data(BRANCHES," where branches_no='$branches_no'");
										 								?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $ep['gallery_no'];?></td>
                <td><?php echo $ep['gallery_name'];?></td>
                <td><?php echo $branch[0]['branches_name'];?></td>
                <td><a href="gallery.php?action=edit&c_id=<?php echo $ep['c_id'];?>"><span class="label label-info">EDIT</span></a> 
                
                <?php 
					$gallery_no	= $ep['gallery_no'];
					$arrAcCheck =jk_select_data(CUSTOMER," where gallery_no = '$gallery_no' LIMIT 1");
					
					if(empty($arrAcCheck)){?>
                <a href="gallery.php?action=delete&c_id=<?php echo $ep['c_id'];?>" onclick="return confirm('are you sure want to delete?');"><span class="label label-warning">Delete</span></a>
                <?php }?>
                </td>
              </tr>
              <?php 

										   $i++;

	} 								?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body --> 
        
      </div>
      
      <!-- /.box --> 
      
    </div>
  </div>
  
  <!-- /.col --> 
  
</div>

<!-- ./row --> 

<!-- /. row --> 

<script src="<?php echo ADMINURL;?>js/jquery.validate.js" type="text/javascript"></script> 
<script>

$("#form1").validate({

    rules: { 

	gallery_name: { required: true,},

	gallery_address: { required: true,},

    gallery_phone: { required: true,},



    

    },

    messages: {

	gallery_name: { required: '<br>Please enter name',},

	gallery_address: { required: '<br>Please enter Finline address',},

   gallery_phone: { required: '<br>Please enter phone',}  

    }



    });



</script>
<?php include(ADMININC."/footer.php"); ?>
