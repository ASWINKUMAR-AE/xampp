<?php 

include("dbcon.php");

$get_id=$_GET['admin_id'];

mysqli_query($conn,"delete from slider where admin_id = '$get_id' ")or die(mysqli_error());
	echo "<script>window.location='slider.php'</script>";

?>