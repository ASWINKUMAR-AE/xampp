<?php

// Set error handling to catch fatal errors
register_shutdown_function('handleFatalError');

function handleFatalError() {
    $error = error_get_last();
    if ($error !== null && $error['type'] === E_ERROR) {
        // Redirect to another page
        header('Location: error_page.html ');
        exit(); // Make sure to exit after redirecting
    }
}


include('smtp/PHPMailerAutoload.php');

// Function to generate a random 16-digit reference ID
function generateReferenceId() {
    return mt_rand(1000000000000000, 9999999999999999);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a connection to the database
    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "addmission"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

     // Generate reference ID
     $referenceId = generateReferenceId();

     // Set default value for course_studied if not selected

    
    // Prepare SQL statement
    $sql = "INSERT INTO students(reference_id, studname, gender, standard, last_studied, studmarks, wish_join, department_preference, course_studied, stud_number, parent_number, stud_address, email)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssss", $referenceId, $studname, $gender, $standard, $last_studied, $studmarks, $wish_join, $department_preference, $course_studied, $stud_number, $parent_number, $stud_address, $email);


    // Set parameters
    $studname = $_POST["studname"];
    $gender = $_POST["gender"];
    $standard = $_POST["standard"];
    $last_studied = $_POST["last_studied"];
    $studmarks = $_POST["studmarks"];
    $wish_join = $_POST["wish_join"];
    $department_preference = implode(", ", $_POST["department_preference"]); // Combine selected values into a comma-separated string
    $course_studied = isset($_POST["course_studied"]) ? $_POST["course_studied"] : "No";
    $stud_number = $_POST["stud_number"];
    $parent_number = $_POST["parent_number"];
    $stud_address = $_POST["stud_address"];
    $email = $_POST["email"];

    // Execute the statement
    if ($stmt->execute()) {
        // Send acknowledgment email
        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rathishkw.d@gmail.com'; // Replace with your Gmail username
        $mail->Password = 'fvav ycjl fdkc ikcq'; // Replace with your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('rathishkw.d@gmail.com', 'TNGPTC');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Acknowledgment of Form Submission';
        $mail->Body = "<b>Dear $studname</b>,<br><br>Thank you for submitting the form.<h3> Your reference ID is: $referenceId For Future Reference.</h3><br><br>We have received your details.<br><br>Best regards,<br><p>Tamilnadu Government Polytechnic College(Autonomous), Madurai - 625011</p>";

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo "<script> alert('Your Form was Submitted Successfully!.'); </script>'";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }




include("index.html");
    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
