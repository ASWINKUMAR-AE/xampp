<?php
include("connection/config.php");
$sno = $_POST['sno'];
$date = $_POST['dat'];
$lnme = $_POST['lname'];
$sub = $_POST['subj'];
$nott = $_POST['nott'];
//$fill = $_POST['fupload'];


$target_dir = "learning/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$file_name	=	basename($_FILES["img"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

 if ($target_file == "learning/") {
        $msg = "cannot be empty";
        $uploadOk = 0;
    } // Check if file already exists
    else if (file_exists($target_file)) {
        $msg = "Sorry, file already exists.";
        $uploadOk = 0;
    } // Check file size
    else if ($_FILES["img"]["size"] > 5000000) {
        $msg = "Sorry, your file is too large.";
        $uploadOk = 0;
    } // Check if $uploadOk is set to 0 by an error
    else if ($uploadOk == 0) {
        $msg = "Sorry, your file was not uploaded.";

        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            $msg = "The file " . basename($_FILES["img"]["name"]) . " has been uploaded.";
        }
    }



$query = "INSERT INTO learning(sno,dat,lname,subj,img) VALUES('$sno','$date','$lnme','$sub','$file_name')";
$result = mysqli_query ($CN,$query) or die(mysqli_connect_error());
if($result) 
    { 

	?>
	
	<script type="text/javascript">
 alert ( "Record Add Successfully !!" );
</script>
<?php
	echo '<script>window.location="Learningview.php"</script>';
          } 
    else
    { 
     echo "Problem in inserting record";
	echo '<script>window.location="index.php"</script>';
    } 

?>

