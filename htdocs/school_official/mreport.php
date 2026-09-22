<?php
//echo phpinfo();
ini_set('allow_url_fopen', 'On');
//echo "hai";
//exit;
//include connection file 
session_start();


require('fpdf/fpdf.php');
include 'fpdf/exfpdf.php';
include 'fpdf/easyTable.php';
//include("connection/connect.php");

$pdf = new exFPDF();
$pdf->AddPage(); 
$pdf->SetFont('helvetica','',10);



$arrDesig = array();


function Header_new(){
		global $pdf, $db, $arrDesig;



		$officer_design2 = "";
		$insdate = "";
		$depot = "";
		$com_sendby = "";
		$des = "";
		$actby = "";
		//print_r($_SESSION);exit;
	

	

		$pdf->Image('logg.png',34,6,20);
		$pdf->SetFont('times','B',14);
		// Move to the right
		$pdf->Cell(80);
		// Title
		$pdf->Cell(43,15,'WELCOME TO RAILNET SOFTWARE SOLUTIONS',10,-5,'C');
		$pdf->SetFont('times','B',12);
		$pdf->SetTextColor(0,0,128);
		$pdf->Cell(-45,40,'Railway Colony,Madurai-625016',10,-5,'C');
	$pdf->SetFont('times','B',16);
		
	$pdf->Line(10, 45, 210-20, 45);
		$pdf->Ln(20);
		$pdf->SetFont('times','B',11);
	$pdf->SetTextColor(0,0,0);
	$pdf->Ln(20);
	
		$c_height=8;
		$text	= 'Dear student '.$_GET['sname'].'';
		//$nb=WordWrapnew($text,120);
		$pdf -> Write($c_height,$text);
		$pdf->Ln(8);
		$text	= 'Greetings from RAILNET SOFTWARE SOLUTIONS.';
		//$nb=WordWrapnew($text,120);
		$pdf -> Write($c_height,$text);
		$pdf->Ln(8);
		$text	= 'We thank you for registering with us.';
		//$nb=WordWrapnew($text,120);
		$pdf -> Write($c_height,$text);
	    $pdf->Ln(8);
		$text	= 'The mail is regarding your registration up on Railnet software solutions for ';
 
 $pdf -> Write($c_height,$text);
	    $pdf->Ln(8);
 $text=$_GET['cour'];
 $pdf->SetTextColor(0,0,128);
		//$nb=WordWrapnew($text,120);
		
		$pdf -> Write($c_height,$text);
		$pdf->Ln(8);
			$text	= 'Once again, we thank you for your inquiry and, we are looking forward to serving you better. ';
			$pdf->SetTextColor(0,0,0);
		//$nb=WordWrapnew($text,120);
		$pdf -> Write($c_height,$text);
		$pdf->Ln(8);
		$text	= 'We wish you all the best.';
		//$nb=WordWrapnew($text,120);
		$pdf -> Write($c_height,$text);
		$pdf->Ln(8);
$text	= 'with regards, ';
		//$nb=WordWrapnew($text,120);
		$pdf -> Write($c_height,$text);
		$pdf->Ln(8);
	$text	= 'Secratary.';
		//$nb=WordWrapnew($text,120);
		$pdf -> Write($c_height,$text);
		$pdf->Ln(8);
		
			//$text	= 'Dear '.$_GET['sname'].' I have sent pdf through mail Please Download and check it';
		//$nb=WordWrapnew($text,120);
			//$pdf->SetTextColor(0,0,128);
		//$pdf -> Write($c_height,$text);
		//$pdf->Ln(8);
		
		
		$pdf->Image('rr.png',150,120,20);
		$pdf->SetFont('times','B',14);
		// Move to the right
		$pdf->Cell(80);
		// Title
		$pdf->Cell(140,50,'ACCOUNTAR',10,-5,'C');
		$pdf->SetFont('times','B',12);
		$pdf->SetTextColor(0,0,128);

	}
	
	function Footer_new()
	{
		global $pdf;
		// Position at 1.5 cm from bottom
		$pdf->SetY(-35);
		// Arial italic 8
		$pdf->SetFont('Arial','I',8);
		// Page number
		$pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');
	}



Header_new();


$table = new easyTable($pdf, '%{10,40,15,15,20}', 'border:1');



$pdf->Ln();


$table->printRow();




$table->endTable(5);


// Line break
$pdf->Ln(30);
$pdf->SetFont('times','B',13);
//$pdf->Cell(+310,20,$_SESSION['design'].'',20,-5,'C');
$pdf->Ln(7);
$pdf->SetFont('times','B',13);
//$pdf->Cell(312,20,$zoneName.', '.$_SESSION['divi'].' Division',10,-5,'C');
//$pdf->Cell(312,20,$_SESSION['divi'].' Division, '.$zoneName,10,-5,'C');
Footer_new();

$path 		=	dirname(__FILE__).'/uploads/';

$filename	=	$path.$_GET['filename'];

//echo dirname(__FILE__);
$pdf->Output($filename,'F');

//echo $pdf->Output();
?>