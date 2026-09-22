<?php
$host= "localhost";
$username="root";
$pwd="";
$db="test_ex";

$conn = mysqli_connect($host,$username,$pwd,$db);

if($conn){
    echo "Successfully connect";

}
$name= $_POST['name'];
$sql= "INSERT INTO  name(name) values('$name')";

if(mysqli_query($conn,$sql)){

echo "done";
}
 
$sql2= "SELECT * FROM name";
$rs=mysqli_query($conn,$sql2);

        while($row=mysqli_fetch_assoc($rs)){
            echo $row['name'] . "<br>";
        }




?>
<form action="#" method="post">
<input name="name2" type="text" >

<button >submit</button>
</form>
<?php

$as= $_POST["name2"];
if(!preg_match("/^[a-zA-Z]+$/",$as)){
  
   echo "invalid";

}
else{
 
      echo "valid";
}


?>