<?php
session_start();
?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include("header.php"); ?>
<?php include("slide1.php"); ?>
<style>
  .count{
    position: relative;
    top: -65px;
    left: -50px;
    font-size: 60px;
  }
  </style>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#FFFFFF">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>No of Tutor</p>
              <div id="tutor_count" style="font-size: larger;font-weight: bolder;color: rgb(244, 232, 255);float:right;">
        <?php
        // Database credentials
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "robbi";

        // Create a connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Correct SQL query to count the number of centers
        $sql = "SELECT COUNT(*) AS tutor_count FROM tutor";

        // Execute the query
        $result = $conn->query($sql);

        // Check if the query execution was successful
        if ($result) {
            // Fetch the result
            $row = $result->fetch_assoc();
            // Display the result in the div
            echo "<span class='count'>" . $row['tutor_count'] . "</span>";
        } else {
            // Debugging output
            echo "Error executing query: " . $conn->error;
        }

        // Close the connection
        $conn->close();
        ?>
    </div>

              
            </div>
           <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <p>No of Student</p>
              <div id="student-count" style="font-size: larger;font-weight: bolder;color: rgb(244, 232, 255);float:right;">
        <?php
        // Database credentials
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "robbi";

        // Create a connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Correct SQL query to count the number of centers
        $sql = "SELECT COUNT(*) AS center_count FROM student";

        // Execute the query
        $result = $conn->query($sql);

        // Check if the query execution was successful
        if ($result) {
            // Fetch the result
            $row = $result->fetch_assoc();
            // Display the result in the div
            echo "<span class='count'>" . $row['center_count'] . "</span>";
        } else {
            // Debugging output
            echo "Error executing query: " . $conn->error;
        }

        // Close the connection
        $conn->close();
        ?>
    </div>

            </div>
           
            <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
       
        <!-- ./col -->
      
        <!-- ./col -->
      </div>
      <!-- /.row -->
    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include("footer.php"); ?>