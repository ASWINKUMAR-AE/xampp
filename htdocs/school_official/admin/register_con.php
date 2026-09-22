<?php
include 'DatabaseConfig.php';

$name = $_POST['name'];
$person = sha1($_POST['pass']);
$from = $_POST['email'];
$nam = $_POST['mob'];
$tit = $_POST['addr'];

$query = "INSERT INTO admin (name,password,email,mob,addr) VALUES('$name','$person','$from','$nam','$tit')";
$result = mysqli_query ($conn,$query);
if($result) 
    { 
	?>
	
	<script type="text/javascript">
 alert ( "Admin added Successfully !!" );
</script>
<?php
	echo '<script>window.location="register.php"</script>';
          } 
    else
    { 
     echo "Problem in inserting record";
	echo '<script>window.location="register.php"</script>';
    } 
 //   mysql_close($con); 

?>
