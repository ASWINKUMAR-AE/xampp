<?php
session_start();
include 'DatabaseConfig.php';
$username = $_POST['email']; 
$password = $_POST['pword']; 
$query = ("SELECT * FROM admin where name='$username' and password='$password' ");
$result = mysqli_query ($conn,$query);
if($row=mysqli_fetch_array($result))
{
    $id=$row['admin_id'];
	$email=$row['email'];
    
               // echo "Testing Count is : $id<br>";

}
        else{
            echo "Query not working";
        }
if(mysqli_num_rows($result)>0)
    {
	$_SESSION['admin_id'] = $id;
   $_SESSION['email'] = $email;
   }
   if($result){
	   echo 'success';
    } 
    else
    { 
	echo 'error';

    } 
?>