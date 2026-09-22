
<?php
session_start();
?>

<?php include 'connect.php'; ?>  
<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productBrand = $_POST['productBrand'];
    $productDescription = $_POST['productDescription'];
    $targetDir = "product_img/";
    $targetFile = $targetDir . basename($_FILES["productImage"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["productImage"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile)) {
            $sql = "INSERT INTO products (name, price, image,brand,description) VALUES ('$productName', '$productPrice', '$targetFile','$productBrand','    $productDescription')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>window.location.href='admin_index.php'; alert('Insert the product data successfully!!');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
}

$conn->close();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/svg+xml" href="/vite.svg" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DRAWING WITH ASWIN</title>



  <link rel="stylesheet" href="css/main.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">


</head>

<body class="  mx-auto">

<?php if(isset($_SESSION['admin_name'])): ?>
<?php include'admin_header.php';?>
 <style>
        body {
           
            color: white;
        }

        .sidebar {
            background-color: #202020;
            min-height: 100vh;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
        }

        .sidebar a:hover {
            background-color: #343434;
        }

        .card {
            background-color: #2c2c2c;
            border: none;
        }

        .card-header {
            background-color: #2c2c2c;
            border-bottom: 1px solid #3e3e3e;
        }

        .card-body {
            color: white;
        }

        .task-list a {
            color: white;
            text-decoration: none;
        }

        .task-list a:hover {
            background-color: #343434;
        }

        .highlight {
            background-color: orange;
            color: black;
        }
    </style>
</head>

<body>
    


<div class="container mt-5">
    
        <h2 class="mb-4">Upload Product Details</h2>
        <center><form action="#" method="post" class="col-10" enctype="multipart/form-data" class="form-horizontal" style="border-left:1px solid orange; padding:10px;"><br>
            <div class="form-group row">
                <label for="productName" class="col-sm-2 col-form-label">Product Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="productName" name="productName" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="productPrice" class="col-sm-2 col-form-label">Product Price:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="productPrice" name="productPrice" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="productPrice" class="col-sm-2 col-form-label">Product Brand Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="productBrand" name="productBrand" required>
                </div>
            </div>
<br>
            <div class="form-group row">
                <label for="productDescription" class="col-sm-2 col-form-label">Product description:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="productDescription" name="productDescription" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="productImage" class="col-sm-2 col-form-label">Product Image:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" id="productImage" name="productImage" accept="image/*" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </form></center>
    </div>
 <?php else: ?>
<script>window.location.href="admin_login.php";</script>
                <?php endif; ?>

</body>

</html>