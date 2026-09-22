<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>kani</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link rel="stylesheet" href="css/addtocart.css">
    <link rel="stylesheet" href="css/user.css">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="website icon" type="png" href="img/logo.png">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .images {
            border-radius: 20px;
            background: white;
            transition: all 2s;
        }

        .images:hover {
            transform: scale(1.1);
        }

        @media (max-width: 576px) {
            #cart {
                margin-left: -190px !important;
            }

            #message {
                display: inline !important;
            }

            #name {
                margin-left: -10px !important;
            }
        }
    </style>

</head>

<body>

    <!-- Header -->
    <?php include 'header.php'; ?>
    <!-- End Header -->

    <br><br><br><br><br><br><br><br><br>

    <?php if(isset($_SESSION['name'])): ?>
                
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row">
<div class="col-sm-3">

<div class="panel panel-default">

</div>
</div>
<div class="col-12">
<div class="row">
    <h2><center style="color:white;">  <img src="img/05.jpg" width="40" height="40" class="img-fluid">  User <span style="color:orange;">Details<hr></span></center></h2>
<div class="col-7">

<h3 class="user-profile__title" style="color:orange;"><?php $name = $_SESSION['name'];  echo $name ;?>  <a href="upd.php"><button style="background-color:gray; border-radius:20px; padding:5px; font-size:12px;  " class="col-1">Edit</button> </a> </h3>

<p class="user-profile__desc">
<div>email :<?php $email = $_SESSION['eamil'];  echo $email ;?></div>
<div>Address:<?php $address = $_SESSION['address'];  echo $address ;?></div>



</p>




</div>
<div class="col-sm-5">

<ul class="user-profile__info">



</ul>
</div>
<div class="col-sm-12">
<div class="user-profile__tabs">

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kani";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





?>

               
               
            <div class="col-10" >
            <h2 style="color:orange; text-align:center;">Purchase Product Details</h2>
<center>       

<table class="table table-bordered table" >
            <thead>
                <tr>
                <th scope="col" class='col-1'>ID</th>
                    <th scope="col">Product Name</th>
                    <th  scope="col">Price</th>
                    <th  scope="col" class='col-1'>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch data from the database
                $query = "SELECT id,product_name, price,quantity  FROM user_product WHERE email = '$email' AND user_name='$name'  ";
                $result = mysqli_query($conn, $query);

                // Display data in the table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr scope='row'>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['product_name']}</td>";
                    echo "<td>{$row['price']}</td>";
                    echo "<td>{$row['quantity']}</td>";

                    echo "</tr>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>


        </center>
            </div>   
               
            <div class="col-10" >
            <h2 style="color:orange; text-align:center;">Purchase Product Data and time</h2>
<center>       

<table class="table table-bordered " >
            <thead>
                <tr>
                <th scope="col" class='col-3'>ID</th>
                    <th scope="col"><center> Purchase Date and Time</center></th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "kani";
                
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                
                // Fetch data from the database
                $query2 = "SELECT id, purchased_time FROM user_product WHERE email = '$email' AND user_name='$name'  ";
                $result2 = mysqli_query($conn, $query2);

                // Display data in the table
                while ($row = mysqli_fetch_assoc($result2)) {
                    echo "<tr scope='row'>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td><center>{$row['purchased_time']}</center></td>";
                 

                    echo "</tr>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>


        </center>
            </div>   
               
               
               
               
                <?php else: ?>
<script>window.location.href="form.php";</script>
                <?php endif; ?>

            

    </div>

   
</body>

</html>
