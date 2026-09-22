<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $phoneNumber = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Set recipient email address
    $to = "rekhac19800721@gmail.com";

    // Set email subject
    $subject = "New message from website";

    // Construct email body
    $body = "Name: $name\n";
    $body .= "Phone number: $phoneNumber\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message";

    // Set additional headers
    $headers = "From:rekhac19800721@gmail.com"; // Replace with your sender email address

    // Check if all required parameters are valid
    if (!empty($to) && !empty($subject) && !empty($body)) {
        // Send email
        if (mail($to, $subject, $body, $headers)) {
            echo "Message sent successfully.";
        } else {
            echo "Failed to send message.";
        }
    } else {
        echo "Invalid parameters for sending email.";
    }
}
?>
