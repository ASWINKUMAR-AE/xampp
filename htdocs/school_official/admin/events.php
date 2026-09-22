
<?php
error_reporting(0);
include 'DatabaseConfig.php';
if (isset($_GET['del']))
{   

$result = mysqli_query($conn,"DELETE FROM events where event_id=".$_GET["del"]); 
if(($result))
{
         echo "Record Deleted Successfully";

         echo '<script>window.location="events.php"</script>';
      }
      else
      {
//if($result) 
//    { 
             echo "No Record Found";
    echo '<script>window.location="home.php"</script>';
          } 
    
}
?>
 <?php include("header.php")?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Event Details</h2>
                    <ul class="nav navbar-right panel_toolbox">

                            <li>
							<a href="addevent.php" style="background:none;">
							<button class="btn btn-primary"><i class="fa fa-plus"></i> Add Event</button>
							</a>
							</li>
				
                            
                        </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   </div>
				
				 <?php

$result = mysqli_query($conn, "SELECT * FROM events");

 
 ?>
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                           
                             <th>ACTION</th>	 
                          <th>Event Title</th>
						  <th>DESCRIPTION</th>

                        </tr>
                      </thead>

                      <tbody>
                          
                          
                          <?php
      if( mysqli_num_rows( $result )==0 ){
        echo '<tr><td align="center" colspan="4"> No Rows Returned </td></tr>';
      }else{
        while( $row = mysqli_fetch_assoc( $result ) ){
            
            
          echo "<tr>
                    <td><a  href='eventmodify.php?id=".$row['event_id']."'><img src=\"images/edit.gif\"/> <a href='events.php?del=".$row['event_id']."'><img src=\"images/dele.png\" /></a></a></td>

          
	 <td>{$row['event_name']}</td> 
	 <td>{$row['des']}</td>

		  </tr>\n";
		  		 
        }
      }
    ?>
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            
              </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        
        <!-- /footer content -->
      
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    
  
    
   
  

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

  </body>
</html>