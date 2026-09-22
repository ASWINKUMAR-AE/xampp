<?php
	
include 'DatabaseConfig.php';

if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysqli_query($conn,"select * from  offers where id='$id'");
$query2=mysqli_fetch_array($query1);
?>