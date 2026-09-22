<?php
include('smtp/PHPMailerAutoload.php');
include 'dbcon.php';
error_reporting();
$sno=$_POST['sno'];
$name = $_POST['sname'];
$mob = $_POST['dob'];
$issue = $_POST['addr'];
$tit = $_POST['mno'];
$dep = $_POST['email'];
$cour = $_POST['ecom'];
$dob = $_POST['dep'];
$mno = $_POST['yea'];
$ecom = $_POST['noi'];
$yea = $_POST['cour'];
$noi = $_POST['pg'];
$dura=$_POST['dur'];

$varFilename	=	date('YmdHis')."_".rand(0,999).".pdf";



$query = "INSERT INTO student (sno,studentname,dob,addr,mno,email,ecom,dep,yea,noi,cour,pg,dur) VALUES('$sno','$name','$mob','$issue','$tit','$dep','$cour','$dob','$mno','$ecom','$yea','$noi','$dura')";
$result = mysql_query ($query);
if($result) 
    { 
	
//mail start

$varUrl	=	'mreport.php?sno='.$_POST['sno'].'&sname='.$_POST['sname'].'&dob='.$_POST['dob'].'&addr='.$_POST['addr'].'&mno='.$_POST['mno'].'&email='.$_POST['email'].'&ecom='.$_POST['ecom'].'&dep='.$_POST['dep'].'&yea='.$_POST['yea'].'&noi='.$_POST['noi'].'&cour='.$_POST['cour'].'&pg='.$_POST['pg'].'&dur='.$_POST['dur'].'&filename='.$varFilename;
//echo "<br>";
$url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$x = pathinfo($url);


//echo $x['dirname'];
//echo "<br>";
$varCallUrl	=	$x['dirname']."/".$varUrl;

$varCallUrl = str_replace(' ', '%20', $varCallUrl);

//echo $uri = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
//echo $varCallUrl;
  //echo "<br><br><br>";
  
  
  $arrContextOptions=array(
      "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );  

 $response = file_get_contents($varCallUrl, false, stream_context_create($arrContextOptions));
//echo $varfilepath	=	file_get_contents($varCallUrl);
 $fileurl	=	$x['dirname']."/"."uploads/".$varFilename;
//exit;

$msgsub1="<br> Course Booking MSG <br> Name:".$name."<br>Stream (course/project/internship/inplant training):".$cour."<br>Series no:".$sno."<br>For any queries,please contact<br>Landline: +(91) 452 2308785<br>Address: Railnet software solutions,<br>Railway colony, Madurai-625016.";

$html=$msgsub1;
$submail="New Course  Booking  ".$cour."  ".$ecom;


	$mail = new PHPMailer(); 
	
	$mail->SetFrom("srwwo@srwwo.com");
	$mail->Subject = $submail;
	$mail->Body =$html;
	$mail->AddAddress($_POST['email']);
	$mail->IsHTML(true); 
	$mail->addAttachment("uploads/".$varFilename);
	
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	$mail->Send();
	
	/*
  $headers = 'From: srwwo@srwwo.com'       . "\r\n" .
                 'Reply-To: srwwo@srwwo.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
 $headers .= "MIME-Version: 1.0\r\n";
//echo $_SERVER['DOCUMENT_ROOT'];
  //echo "https://" . $_SERVER['HTTP_HOST'];
  //exit;
  //echo $varfilepath; 
  //echo "<br><br>";
  $fileurl	=	$x['dirname']."/"."uploads/".$varFilename;
 // $content = file_get_contents($fileurl);
   $content = file_get_contents($fileurl, false, stream_context_create($arrContextOptions));
 // exit;
    $content = chunk_split(base64_encode($content));

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (RFC)
    $eol = "\r\n";

    // main header (multipart mandatory)
   
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;

    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $msgsub1 . $eol;

    // attachment
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $varFilename . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";
  
  mail($_POST['email'], $submail, $body, $headers);*/
//email end

     echo "<script>alert('Application Submitted Successfully!');window.location.href='booknow.php';</script>";
          } 
    else
    { 
	
 echo "<script>window.location.href='booknow.php';</script>";
    } 
?>
