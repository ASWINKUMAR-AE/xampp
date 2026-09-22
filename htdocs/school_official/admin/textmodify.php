<?php include ('dbcon.php');
$ID=$_GET['id'];
 ?> 
<?php include("header.php")?>


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            

            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
			  
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Offer Details</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
                                              <!-- content starts here -->
<?php
  $query=mysql_query("select * from texts where event_id='$ID'")or die(mysql_error());
$row=mysql_fetch_array($query);
  ?>
                      
                     <form method="post" class="form-horizontal form-label-left" novalidate>

                       
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Sliding Text<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="package_name" id="package_name"  value="<?php echo $row['h_text']; ?>"class="form-control col-md-7 col-xs-12">

                        </div>
						
                      </div>
					   
					  
                         
                         
                          
                         
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                             <a href="texts.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                          
                        </div>
                      </div>
                         
                   </form>
                      
                      <?php
$id =$_GET['id'];
if (isset($_POST['update'])) {
										
$package_name = $_POST['package_name'];


$result=mysql_query("select * from texts") or die (mySQL_error());
$row=mysql_num_rows($result);


mysql_query(" UPDATE texts SET h_text='$package_name' WHERE event_id = '$id' ")or die(mysql_error());
echo "<script>alert('Successfully Update Text Info!'); window.location='texts.php'</script>";	

									}

?>
                      
                      
                  </div>
                </div>
              </div>

            
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../ashok/internet/internet/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../ashok/internet/internet/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    
    <!-- Datatables -->
    <script src="../ashok/internet/internet/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../ashok/internet/internet/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    
  
    
   
  

    <!-- Custom Theme Scripts -->
    <script src="../ashok/internet/internet/build/js/custom.min.js"></script>

</body>
</html>