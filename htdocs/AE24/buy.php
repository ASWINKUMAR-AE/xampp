
<?php
session_start();
?>

<?php include 'connect.php'; ?>  
<?php
// Get the id from the URL
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Check if id is not empty
if (!empty($id)) {
    // Get data from the database based on the id
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $price = $row['price'];
        $brand = $row['brand'];
        $image = $row['image'];
        $description = $row['description'];
    } else {
        echo "Data not found";
    }
} else {
    echo "No id found in the URL";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DRAWING WITH ASWIN</title>
  
  <link rel="stylesheet" href="css/main.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
  




    #contact input {
      font: 400 12px/16px;
      width: 100%;
      border: 1px solid #CCC;
      background: #FFF;
      margin: 10 5px;
      padding: 10px;
    }

    h1 {
      margin-bottom: 30px;
      font-size: 30px;
    }

    #contact {
      background: #F9F9F9;
      padding: 25px;
      margin: 50px 0;
    }


    fieldset {
      border: medium none !important;
      margin: 0 0 10px;
      min-width: 100%;
      padding: 0;
      width: 100%;
    }

    textarea {
      height: 100px;
      max-width: 100%;
      resize: none;
      width: 100%;
    }

    button {
      cursor: pointer;
      width: 100%;
      border: none;
      background: rgb(17, 146, 60);
      color: #FFF;
      margin: 0 0 5px;
      padding: 10px;
      font-size: 20px;
    }

    button:hover {
      background-color: rgb(15, 95, 42);
    }
  </style>
</head>

<body>

  <div class="container">
    <form id="contact" action="mail.php" method="post">
      <h1>Purchase Details</h1>
    <div style="float:right;">  <img src="admin/<?php echo $row["image"]; ?>" class="card-img-top img-fluid rounded" style="width:100px;" alt="<?php echo "Watch Name:  ".$row["name"].",   "."Watch Brand name:  ".$row["brand"].",   "."Watch Price:  Rs.  ".$row["price"].",   ";?>" >
      <input name="image" type="hidden" value="<?php echo $row["image"]; ?>">
    
  </div>  <fieldset>
        <input placeholder="Your name"  type="text" tabindex="1" autofocus value="<?php echo   $_SESSION['user_name']; ?>" disabled>
        <input placeholder="Your name" name="name" type="text" tabindex="1" autofocus value="<?php echo   $_SESSION['user_name']; ?>" hidden>

      </fieldset>
   
     

      <fieldset>
        <input placeholder="Your Email Address" type="email" tabindex="2"value="<?php echo   $_SESSION['user_email']; ?>" disabled>
        <input placeholder="Your Email Address" name="email" type="email" tabindex="2"value="<?php echo   $_SESSION['user_email']; ?>" hidden>
      </fieldset>
    

      <fieldset>
        <input placeholder="subject" type="text" tabindex="4" value="AE Watch " disabled>
        <input placeholder="subject" type="text" name="subject" tabindex="4" value="AE Watch "  hidden>
      </fieldset>

      <fieldset>
        <input  tabindex="5"   type="text" value="<?php echo  $_SESSION['address']; ?>" disabled >
        <input name="address" tabindex="5"   type="text" value="<?php echo  $_SESSION['address']; ?>"   hidden>
      </fieldset>



      <fieldset>

        <input name="watchname" tabindex="5"   type="text" value="<?php echo " ".$row["name"]."";?>" hidden >
      </fieldset>

      <fieldset>

        <input name="watchbrand" tabindex="5"   type="text" value="<?php echo " ".$row["brand"]."";?>" hidden >
        <input name="price" tabindex="5"   type="text" value="<?php echo "  ".$row["price"]."";?>" hidden >




      </fieldset>

      <fieldset>
      <input  tabindex="5"   type="text" value="<?php echo " ".$row["name"].",   "."Watch Brand name:  ".$row["brand"].",   "."Watch Price:  Rs.  ".$row["price"].",   ";?>" disabled >
      <input name="message" tabindex="5"   type="text" value="<?php echo "Watch Name:  ".$row["name"].",   "."Watch Brand name:  ".$row["brand"].",   "."Watch Price:  Rs.  ".$row["price"].",   ";?>" hidden >
       
      </fieldset>

  
      <fieldset>
        <button type="submit" name="send" id="contact-submit">Buy Now</button>
      </fieldset>
    </form>
  </div>
</body>

</html>