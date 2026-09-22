<?php
session_start();
include '../db/db.php'; // Make sure this points to your actual database connection file
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
require '../PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $artistId = htmlspecialchars($_POST['artist_id']);
    $customerId = htmlspecialchars($_POST['customer_id']);
    $customerName = htmlspecialchars($_POST['customer_name']);
    $customerEmail = htmlspecialchars($_POST['customer_email']);
    $customerPhone = htmlspecialchars($_POST['customer_phone']);
    $artworkTitle = htmlspecialchars($_POST['artwork_title']);
    $artworkDescription = htmlspecialchars($_POST['artwork_description']);
    $paperSize = implode(", ", $_POST['paper_size']);
    $submissionDate = htmlspecialchars($_POST['submission_date']);
    $sketchRange = htmlspecialchars($_POST['sketch_range']);
    $faceCount = htmlspecialchars($_POST['face_count']);
    $additionalNotes = htmlspecialchars($_POST['additional_notes']);

    // Ensure the upload directory exists
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Handle the uploaded file
    $artworkImage = $_FILES['artwork_image'];
    $targetFilePath = $targetDir . basename($artworkImage['name']);
    if (move_uploaded_file($artworkImage['tmp_name'], $targetFilePath)) {

        // Save the order to the database
        $sql = "INSERT INTO orders (customer_id, artist_id, customer_name, customer_email, customer_phone, artwork_title, artwork_description, artwork_image, paper_size, submission_date, sketch_range, face_count, additional_notes)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("iisssssssssss", $customerId, $artistId, $customerName, $customerEmail, $customerPhone, $artworkTitle, $artworkDescription, $targetFilePath, $paperSize, $submissionDate, $sketchRange, $faceCount, $additionalNotes);
            $stmt->execute();

            // Fetch artist email
            $sqlArtist = "SELECT email FROM users WHERE id = ?";
            $stmtArtist = $conn->prepare($sqlArtist);
            if ($stmtArtist) {
                $stmtArtist->bind_param("i", $artistId);
                $stmtArtist->execute();
                $resultArtist = $stmtArtist->get_result();
                if ($artist = $resultArtist->fetch_assoc()) {
                    $artistEmail = $artist['email'];

                    // Send emails
                    $mail = new PHPMailer(true);
                    try {
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com'; // Your SMTP server
                        $mail->SMTPAuth = true;
                        $mail->Username = 'aswinkumarta2006@gmail.com';
                        $mail->Password = 'hvmoudxiujohcplp'; // Replace with your actual password
                        $mail->SMTPSecure = 'tls';
                        $mail->Port = 587;

                        // Email to the artist
                        $mail->setFrom('aswinkumarta2006@gmail.com', 'Your Website');
                        $mail->addAddress($artistEmail);
                        $mail->Subject = 'New Artwork Order';
                        $mail->Body = "You have received a new order.\n\nOrder details:\n
                                        Customer Name: $customerName\n
                                        Email: $customerEmail\n
                                        Phone: $customerPhone\n
                                        Artwork Title: $artworkTitle\n
                                        Description: $artworkDescription\n
                                        Paper Size: $paperSize\n
                                        Submission Date: $submissionDate\n
                                        Sketch Range: $sketchRange\n
                                        Face Count: $faceCount\n
                                        Additional Notes: $additionalNotes";
                        $mail->send();

                        // Email to the customer
                        $mail->clearAddresses();
                        $mail->addAddress($customerEmail);
                        $mail->Subject = 'Order Confirmation';
                        $mail->Body = "Thank you for your order, $customerName!\n\nYour order details:\n
                                        Artwork Title: $artworkTitle\n
                                        Description: $artworkDescription\n
                                        Submission Date: $submissionDate\n
                                        Paper Size: $paperSize\n
                                        Sketch Range: $sketchRange\n
                                        Face Count: $faceCount\n
                                        Additional Notes: $additionalNotes";
                        $mail->send();

                        // Redirect to a thank-you page
                        header("Location: order_success.php");
                        exit();
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                } else {
                    echo "Error: Artist not found.";
                }
            } else {
                echo "Error: Could not prepare statement for fetching artist email.";
            }
        } else {
            echo "Error: Could not prepare statement for order insertion.";
        }
    } else {
        echo "Error: Unable to upload the file.";
    }
}
?>
