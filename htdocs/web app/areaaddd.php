<?php
include 'DatabaseConfig.php';
$sname = $_POST['name'];
$sdob = $_POST['dob'];
$smno = $_POST['mno'];
$scom = $_POST['com'];
$query = "INSERT INTO memberadd(name,dob,mno,com,dat) VALUES('$sname','$sdob','$smno','$scom',now())";
$result = mysqli_query ($conn,$query) or die(mysqli_error());
if($result) 
    { 
	?>
	
	<script type="text/javascript">
 alert ( "Record Add Successfully !!" );
</script>
<?php
	echo '<script>window.location="madd.php"</script>';
          } 
    else
    { 
     echo "Problem in inserting record";
	echo '<script>window.location="madd.php"</script>';
    } 
 //   mysql_close($con); 

?>

