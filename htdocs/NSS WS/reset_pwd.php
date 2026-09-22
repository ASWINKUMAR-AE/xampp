<?php
session_start();
include('db.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer classes
require 'phpmailer/src/Exception.php'; 
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Set the timezone to Asia/Kolkata
date_default_timezone_set('Asia/Kolkata');

// Set the content type header to indicate JSON response
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reg_no = isset($_POST['reg_no']) ? $_POST['reg_no'] : '';
    $new_pwd = isset($_POST['new_pwd']) ? $_POST['new_pwd'] : '';
    $entered_otp = isset($_POST['otp']) ? $_POST['otp'] : '';

    // Validate registration number
    if (empty($reg_no)) {
        echo json_encode(['error' => 'Please enter your registration number.']);
        exit;
    }

    // Check if registration number exists
    $stmt = $conn->prepare('SELECT email FROM volunteers WHERE reg_no = ?');
    $stmt->bind_param('s', $reg_no);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(['error' => 'Invalid registration number.']);
        exit;
    }

    // Fetch email address from the database
    $row = $result->fetch_assoc();
    $email = $row['email'];

    // Validate new password
    if (empty($new_pwd)) {
        echo json_encode(['error' => 'Please enter your new password.']);
        exit;
    }

    // Check if OTP is being submitted
    if (!empty($entered_otp)) {
        if ($entered_otp == $_SESSION['generated_otp']) {
            // OTP is correct, update the password
            $hashed_pwd = md5($new_pwd);
            $update_stmt = $conn->prepare('UPDATE volunteers SET password = ? WHERE reg_no = ?');
            $update_stmt->bind_param('ss', $hashed_pwd, $reg_no);
            $update_stmt->execute();

            echo json_encode(['success' => 'Password has been updated successfully.']);
            unset($_SESSION['generated_otp']); // Clear the OTP from the session
        } else {
            echo json_encode(['error' => 'Invalid OTP.']);
        }
        exit;
    }

    // Generate OTP
    $otp = generateOTP();
    $_SESSION['generated_otp'] = $otp;

    // Send OTP via SMTP
    try {
        $mail = new PHPMailer(true);
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'nsstngptc@gmail.com'; // SMTP email address
        $mail->Password   = 'hgmp napj hesa tbvf'; // SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('nsstngptc@gmail.com', 'NSS TNGPTC');
        $mail->addAddress($email); // User's email address

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Hello, Your OTP for password reset';
        $mail->Body    = 'Your OTP is: ' . $otp;

        $mail->send();
        echo json_encode(['otp' => $otp]); // For testing purposes, include the OTP in the response
    } catch (Exception $e) {
        echo json_encode(['error' => 'OTP could not be sent.']);
    }
}

function generateOTP() {
    return rand(100000, 999999); // Generate a random 6-digit OTP
}
?>
