<?php
include 'dbcon.php';
$sno = $_POST['name'];
$typ = $_POST['email'];
$name = $_POST['mobile'];
$stu = $_POST['study'];
$add= $_POST['addr'];

$query = "INSERT INTO reg(name,email,mobile,study,addr) VALUES('$sno','$typ','$name','$stu','$add')";
$result = mysql_query ($query) or die(mysql_error());
if($result) 
    { 
	?>
	
	<script type="text/javascript">
 alert ( "Registered Successfully !!" );
</script>
<?php
	echo '<script>window.location="Railnet.php"</script>';
          } 
    else
    { 
     echo "Problem in inserting record";
	echo '<script>window.location="index.php"</script>';
    } 
 //   mysql_close($con); 

?>

