

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Product Cards</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    .card{
        transition: transform 0.2s;
    }
        .card:hover {
            transform: scale(1.05);
            transition: transform 0.2s;
        }

        .product-card img{
            width: 60%;
            float: right;
  
  margin: 0px 0px 15px 20px;
        }
        .product-card    img {
  --s: 15px;  
  --b: 1px;  
  --w: 350px; 
  --c: orange;
  
  width: var(--w);
  aspect-ratio: 1;
  object-fit: cover;
  padding: calc(2*var(--s));
  --_g: var(--c) var(--b),#0000 0 calc(100% - var(--b)),var() 0;
  background:
    linear-gradient(      var(--_g)) 50%/100% var(--_i,100%) no-repeat,
    linear-gradient(90deg,var(--_g)) 50%/var(--_i,100%) 100% no-repeat;
  outline: calc(var(--w)/2) solid #0009;
  outline-offset: calc(var(--w)/-2 - 2*var(--s));
  transition: .4s;
  cursor: pointer;
}
.product-card img:hover {
  outline: var(--b) solid var(--c);
  outline-offset: calc(var(--s)/-2);
  --_i: calc(100% - 2*var(--s));


  
}
    </style>
</head>
<body>
<?php include 'header.php'; ?>  
<?php if(isset($_SESSION['user_name'])): ?>
                
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
                
                <h3 class="user-profile__title" style="color:orange;"><?php $name = $_SESSION['user_name'];  echo $name ;?>  <a href="upd.php"><button style="background-color:gray; border-radius:20px; padding:5px; font-size:12px;  " class="col-1">Edit</button> </a> </h3>
                
                <p class="user-profile__desc">
                <div>email :<?php $email = $_SESSION['user_email'];  echo $email ;?></div>
            
                
                
                
                </p>
                
                
                
                
                </div>
                <div class="col-sm-5">
                
                <ul class="user-profile__info">
                
                
                
                </ul>
                </div>
                <div class="col-sm-12">
                <div class="user-profile__tabs">
                
            
                
             
<?php include 'connect.php'; ?>  
                
            
                
                               
                               
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
                            <!-- <tbody>
                                <?php
                                // Fetch data from the database
                                // $query = "SELECT id,product_name, price,quantity  FROM user_product WHERE email = '$email' AND user_name='$name'  ";
                                // $result = mysqli_query($conn, $query);
                
                                // // Display data in the table
                                // while ($row = mysqli_fetch_assoc($result)) {
                                //     echo "<tr scope='row'>";
                                //     echo "<td>{$row['id']}</td>";
                                //     echo "<td>{$row['product_name']}</td>";
                                //     echo "<td>{$row['price']}</td>";
                                //     echo "<td>{$row['quantity']}</td>";
                
                                //     echo "</tr>";
                                // }
                
                                // // Close the database connection
                                // mysqli_close($conn);
                                ?>
                            </tbody> -->
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
                            <!-- <tbody>
                             
<?php 
// include 'connect.php';  
                                
//                                 // Fetch data from the database
//                                 $query2 = "SELECT id, purchased_time FROM products WHERE email = '$email' AND user_name='$name'  ";
//                                 $result2 = mysqli_query($conn, $query2);
                
//                                 // Display data in the table
//                                 while ($row = mysqli_fetch_assoc($result2)) {
//                                     echo "<tr scope='row'>";
//                                     echo "<td>{$row['id']}</td>";
//                                     echo "<td><center>{$row['purchased_time']}</center></td>";
                                 
                
//                                     echo "</tr>";
//                                 }
                
//                                 // Close the database connection
//                                 mysqli_close($conn);
                                ?>
                            </tbody> -->
                        </table>
                
                
                        </center>
                            </div>   
                               
                               
                               
                               
                                <?php else: ?>
                <script>window.location.href="form.php";</script>
                                <?php endif; ?>
                
                            
                
                    </div>
</body>
</html>
