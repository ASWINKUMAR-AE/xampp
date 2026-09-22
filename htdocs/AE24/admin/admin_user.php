
<?php
session_start();


include 'connect.php'; 


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {



    $admin_name = $_POST['admin_name'];
    $email = $_POST['email'];
    $admin_id = $_SESSION['admin_id'];


    $sql = "UPDATE admin SET admin_name = '$admin_name', email = '$email' WHERE admin_id = $admin_id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['admin_name'] = $admin_name;
        $_SESSION['email'] = $email;
        echo "<script > alert('Admin data updated successfully.');
        window.location.href='admin_index.php';
        </script>";
    } else {
        echo "<script > alert('Error updating admin data.');</script> " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
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
  
  <style>
.fo{

}
input{margin:10px;  background-color:transparent !important; border:1px solid orange !important;}
</style>
<center style="margin-top:30px;">
 <a href="admin_index.php"> <div class="bg-dark col-2" style="color:orange; border-radius: 20px; padding:10px; margin: 20px;" > <center><<  back</center></div></a>

  <h1>To <span style="color:orange;">Update</span> the <span style="color:orange; font-style: italic;">Admin date</span></h1><hr class="col-5 text-secondary"></center>
<div class="container ">
  <form method="post" action="#" class="col-5 mx-auto fo">
    <div class="form-group">
      <label for="admin_name">Admin Name:</label>
      <input type="text" class="form-control" id="admin_name" name="admin_name" value="<?php echo $_SESSION['admin_name'];?>">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email'];?>">
    </div>
  

    <div class="form-group">
      <label for="phone">Phone number:</label>
      <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $_SESSION['phone'];?>">
    </div>
 


    <center>
    <button type="submit" class="btn btn-primary">
      <span>Update</span>
      <span class="btn-layer"></span>
    </button>
</center>
  </form><br>
  <center class="text-secondary">
 &copy from DRAWING WITH ASWIN
</center>
</div>
  <style>
  .dark {
    background-color: rgb(44, 42, 42) !important;
    color: white; /* Example: Adjust text color for dark mode */
  }

  .light {
    background-color: white !important;
    color: black; /* Example: Adjust text color for light mode */
  }
</style>
        <script>
                  document.body.classList.add('dark');

          function toggleMode() {
            var bodyClassList = document.body.classList;
            if (bodyClassList.contains('dark')) {
              bodyClassList.remove('dark');
              bodyClassList.add('light');
            } else {
              bodyClassList.remove('light');
              bodyClassList.add('dark');
            }
          }
        </script>
 
               
               
 <?php else: ?>
<script>window.location.href="admin_login.php";</script>
                <?php endif; ?>

</body>

</html>