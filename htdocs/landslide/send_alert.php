<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$recipients = [
    'aswinkumarta2006@gmail.com', 'email2@example.com', 'email3@example.com',
    'email4@example.com', 'email5@example.com', 'email6@example.com',
    'email7@example.com', 'email8@example.com', 'email9@example.com', 'email10@example.com'
];

// Get JSON data from the POST request
$data = json_decode(file_get_contents('php://input'), true);

if (!$data || !isset($data['subject']) || !isset($data['message'])) {
    die("Invalid data received");
}

$subject = $data['subject'];
$message = $data['message'];

sendAlertEmail($subject, $message);

function sendAlertEmail($subject, $message) {
    global $recipients;

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.yourmailserver.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'aswinkumarta2006@gmail.com'; // Replace with your email
        $mail->Password = 'zhumarimhbjqwpas'; // Replace with your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        foreach ($recipients as $recipient) {
            $mail->addAddress($recipient); // Add each recipient's email
        }

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Send email
        if ($mail->send()) {
            echo "Email sent successfully!";
        } else {
            echo "Failed to send email.";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        // Log more details if needed for debugging
        error_log("Error sending email: " . $e->getMessage());
    }
}
?>
