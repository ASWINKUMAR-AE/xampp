<?php
// DB Host
$host = "localhost";
// DB Username
$uname = "root";
// DB Password
$password = "";
// DB Name
$dbname = "robbi";
 
 
$conn = new mysqli($host, $uname, $password, $dbname);
if(!$conn){
    die("Database Connection Failed.");
}
?>