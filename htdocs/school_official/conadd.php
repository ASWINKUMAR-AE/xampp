<?php
include 'dbcon.php';
$sno = $_POST['name'];
$typ = $_POST['email'];
$name = $_POST['msg'];
$query = "INSERT INTO contact(name,email,msg) VALUES('$sno','$typ','$name')";
$result = mysql_query ($query) or die(mysql_error());
if($result) 
    { 
	?>
	
	<script type="text/javascript">
 alert ( "Feedback Process Successfully !!" );
</script>
<?php
	echo '<script>window.location="Contact.php"</script>';
          } 
    else
    { 
     echo "Problem in inserting record";
	echo '<script>window.location="index.php"</script>';
    } 
 //   mysql_close($con); 

?>

