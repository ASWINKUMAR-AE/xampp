<?php
session_start();
include 'connect.php';?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->SMTPDebug = 2;

    try {
        //Server settings
        $mail->isSMTP();                              //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                   //Enable SMTP authentication
        $mail->Username   = 'aswinkumarta2006@gmail.com';   //SMTP username
        $mail->Password   = 'hcedetegiwjlrcxz';      //SMTP password (App-specific password if 2FA enabled)
        $mail->SMTPSecure = 'ssl';                   //Enable implicit SSL encryption
        $mail->Port       = 465;                    //TCP port to connect to

        //Recipients
        $mail->setFrom($_POST["email"],  $_POST["subject"]); // Sender Email and name
        $mail->addAddress($_POST["email"]);     //Add a recipient email  
        $mail->addReplyTo($_POST["email"], $_POST["name"]); // reply to sender email

        //Content
        $mail->isHTML(true);               //Set email format to HTML
        $mail->Subject = $_POST["subject"];   // email subject
    

        $query = "SELECT id FROM user_id WHERE user_email = '".$_POST["email"]."'";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Database query failed.");
        }
        $row = mysqli_fetch_assoc($result);
        $userid = $row["id"];
     
        $query = "INSERT INTO orders (watchname, watchbrand, price, name, email, address, user_id) VALUES ('".$_POST["watchname"]."', '".$_POST["watchbrand"]."', '".$_POST["price"]."', '".$_POST["name"]."', '".$_POST["email"]."', '".$_POST["address"]."', '$userid')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Database query failed.");
        }
        $mail->Body    = '<div ><p style="font-weight:bold;color:orange"><b>Watch Name:</b></p>'.$_POST["watchname"].'<br><hr><br><p style="font-weight:bold;color:orange"><b>Watch Brand name:</b></p>'.$_POST["watchbrand"].'<br><hr><br><p style="font-weight:bold;color:orange"><b>Watch Price:</b></p>Rs. '.$_POST["price"].'<br><hr><br><p style="font-weight:bold;color:orange"><b>Shopper Address:</b></p>'.$_POST["address"].'<br><hr><br></div>'; //email message
       

        // Send the email
        $mail->send();
        header('Location: index.php');
  
           
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
