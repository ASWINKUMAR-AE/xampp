
<?php
session_start();
include 'DatabaseConfig.php';
if (isset($_GET['del']))
{   

$result = mysqli_query($conn,"DELETE FROM offers where id=".$_GET["del"]); 
if(($result))
{
         echo "Record Deleted Successfully";

         echo '<script>window.location="offers.php"</script>';
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
                    <h2>Offer Details</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                <!--    </div>
				< ?php
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("Store") or die(mysql_error());
 
 $code = $_SESSION['sno'];

  $result = mysql_query( "SELECT * FROM bookappoinment" );
 
 ?> -->
				 <?php

$result = mysqli_query($conn, "SELECT * FROM offers");

 
 ?>
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                             <th>EDIT</th>
                             <th>DELETE</th>	 
                             <th>ID</th>	 
                          <th>Offer Title</th>
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
                    <td><a  href='offermodify.php?id=".$row['id']."'><img src=\"images/edit.gif\"/></a></td>

          <td><a href='offers.php?del=".$row['id']."'><img src=\"images/dele.png\" /></a></td>
	      <td>{$row['id']}</td>
	 <td>{$row['offer']}</td> 
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
      </div>
    </div>

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