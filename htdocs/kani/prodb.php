

<?php
session_start();

// Check if the user is logged in
if(isset($_SESSION['name'])) {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kani";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_SESSION['name'];
    $email = $_SESSION['eamil']; 
    $address = $_SESSION['address']; 
    $productName = isset($_POST['product_name']) ? $_POST['product_name'] : '';
    $productPrice = isset($_POST['product_price']) ? $_POST['product_price'] : '';
    $productQuantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
    $price=$productPrice * $productQuantity;

$sql = "INSERT INTO user_product (user_name, email, address, product_name, price, quantity, purchased_time) 
            VALUES ('$username', '$email', '$address', '$productName', '$price', '$productQuantity', NOW())";

    if ($conn->query($sql) === TRUE) {
        $date=date("Y/m/d");
        $time=date('H:i:s');

//         echo "<script>
//         alert('successfully');
//   </script>";
 echo "<html>
 <head>
 <meta charset='utf-8'>
 <title>kani</title>
 <meta content='width=device-width, initial-scale=1.0' name='viewport'>
 <link href='css/bootstrap.min.css' rel='stylesheet'>

 <link rel='website icon' type='png'  href='img/logo.png'  >
 <link href='css/style.css' rel='stylesheet'>
 </head>
 <body style='background-color:rgb(43, 42, 42);'>
 <div class='col-8 bg-light' style=' position:relative;top:3%; left:16%; padding:10px; color:black;border-radius:20px;'>

<a href='index.html'><img src='img/logo2.png' width='150' height='70'></a><p style='float:right;color:orange; background-color:rgb(43, 42, 42); border-radius:50px; padding:10px;'>Purchase Successfully <img src='img/buy.png' width='20' height='20'></p><br><hr >

 Name:".$username."  <br> eamil_id:".$email."<br>
 Address:".$address."<br><br>
 <a href='user.php' style='background-color:rgb(43, 42, 42);  color:orange; border-radius:50px; margin-top:10px; padding:10px;'>More details </a>

 <hr>
 <div style='background-color:rgb(43, 42, 42); color:white; padding:10px; border-radius:20px;'>
<center><p style='color:orange;'>Purchase Details <img src='img/buy.png' width='20' height='20'></p></center>

 Product Name:".$productName."<br>
Product price: Rs.".$price."/-  &nbsp; &nbsp; Product Quantity:".$productQuantity."<br>  
Purchase Date:".$date." <br>
Purchase Time:".$time."<br>
<hr>
<center>Delivery done in 3 days from date of purchase</center>
<center>Cash on Delivery</center>
 </div><br> <center><a href='shop.php' style='background-color:rgb(43, 42, 42); border-radius:50px; padding:10px; color:orange;' >  Purchase more products</a></center>
<br>
 </div>
 <!-- Modal for the alert -->
 <div class='modal fade' id='purchaseAlertModal' tabindex='-1' role='dialog' aria-labelledby='purchaseAlertLabel'>
     <div class='modal-dialog' role='document'>
         <div class='modal-content'>
             <div class='modal-header' style='background-color:rgb(43, 42, 42);'>
                 <center><h5 class='modal-title'  style='color:orange;'id='purchaseAlertLabel'>Thank you for purchase!</h5>
               </center>
             </div>
             <div class='modal-body'>
                <center> Your order has been successfully placed.</center>
             </div>
           
         </div>
     </div>
 </div>

 <!-- Include Bootstrap JS and jQuery -->
 <script src='js/jquery.js'></script>
//  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>

 <script>
 $(document).ready(function() {
    // Show the modal when the page loads
    $('#purchaseAlertModal').modal('show');

    // Hide the modal after 5 seconds
    setTimeout(function() {
        $('#purchaseAlertModal').modal('hide');
    }, 3000); // 5000 milliseconds = 5 seconds
});


 </script>

 </body>
 </html>
 
 
 ";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "User is not logged in!";
}
?>
