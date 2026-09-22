
<?php
session_start();
$mess='';


if(!isset($_SESSION['value'])){
$_SESSION['value']= rand(1,100);
}


echo $_SESSION['value'];
if(isset($_POST["nnum_value"])){
$user = $_POST["nnum_value"];

if($_SESSION['value'] < $user){
    $mess= "your value is large, enter correct value ";
}
if($_SESSION['value'] > $user){
    $mess= "your value is small, enter correct value ";
}
if($_SESSION['value'] == $user){
    $mess="correct value ";
  
}
}
?>


<html>
<head>
    <title>random</title>
</head>
<body>
<form method="post" action="#">
<input type="number" name="nnum_value" />

</form>
<p>
<?php echo $mess; ?>
</p>
</body>
</html>