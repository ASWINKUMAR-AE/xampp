<?php
include('db.php');


// AES encryption key (should be stored securely and not hardcoded in real applications)
define('ENCRYPTION_KEY', '116@-secret-encryptiomaduraitngptc');

function admin_reg(){
    include('db.php');

    $reg_no = $_POST['regno'];
    $name = $_POST['name'];
    $username = $_POST['uname'];
    $password = $_POST['pword'];
    $email = $_POST['email'];
    $role = 'admin';
    $mbno = $_POST['mno'];
    $dob = $_POST['dat'];

    // Encrypt the password using AES
    $encrypted_password = encrypt_aes($password, ENCRYPTION_KEY);

    // Check if registration number or email already exists
    $check_user_sql = "SELECT * FROM admin WHERE username='$username' OR reg_no='$reg_no'";
    $result = $conn->query($check_user_sql);

    if ($result->num_rows == 0) {
        $sql = "INSERT INTO admin (reg_no, name, password, email, DOB, Mobile_Number, role, username) VALUES ('$reg_no', '$name', '$encrypted_password', '$email', '$dob', '$mbno', '$role', '$username')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Registration successful."); </script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo '<script> alert("Registration number or username already exists.");window.location.href = "reg_admin.php"; </script>';
    }
}

function encrypt_aes($plaintext, $key) {
    $method = 'aes-256-cbc';
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));
    $encrypted = openssl_encrypt($plaintext, $method, $key, 0, $iv);
    return base64_encode($iv . $encrypted);
}

function decrypt_aes($ciphertext, $key) {
    $method = 'aes-256-cbc';
    $data = base64_decode($ciphertext);
    $iv = substr($data, 0, openssl_cipher_iv_length($method));
    $encrypted = substr($data, openssl_cipher_iv_length($method));
    return openssl_decrypt($encrypted, $method, $key, 0, $iv);
}



function volunteer_reg(){
    include 'db.php';
    $nameErr = $emailErr = $regNoErr = $pwdErr = "";
    $name = $email = $regNo = $pwd = "";

    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate registration number
    if (empty($_POST["reg_no"])) {
        $regNoErr = "Registration number is required";
    } else {
    $regNo = test_input($_POST["reg_no"]);
    // Define an array of allowed patterns
    $patterns = array(
        "/^20[2-9]{2}4[1|2][0-9]{2}/", //CE Both Regular and Lateral Entry
        "/^20[2-9]{2}4[4|2][0-9]{2}/", //WD Both Regular and Lateral Entry
        "/^20[2-9]{2}2[6|2][0-9]{2}/" //EEE Regular
        //"/^20[2-9]{2}3[1|2|3][0-9]{2}/", //Mechanical Regular, Shift
        //"/^20[2-9]{2}1[1|3][0-9]{2}/" 
    );
    // Check if the registration number matches any of the patterns
    $validPattern = false;
    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $regNo)) {
            $validPattern = true;
            break;
        }
    }
    if (!$validPattern) {
        $regNoErr ='Invalid registration number format';

    }
    }

    // Validate password
    if (empty($_POST["pwd"])) {
        $pwdErr = "Password is required";
    } else {
        $pwd = test_input($_POST["pwd"]);
        // Additional password validation can be added here if needed
    }

    // If all fields are valid, proceed with registration
    if (empty($nameErr) && empty($emailErr) && empty($regNoErr) && empty($pwdErr) && empty($regNoErr)) {
        // Perform further actions like database insertion or redirection
        // For demonstration purposes, let's just echo the data
   

         
        $username = $regNo; // Using reg_no as username for simplicity
        $password = md5($pwd);
        $role = 'volunteer'; // Default role for new registrations




 // Default role for new registrations

    // Check if registration number or email already exists
    $check_user_sql = "SELECT * FROM volunteers WHERE username='$username' OR reg_no='$regNo'";
    $result = $conn->query($check_user_sql);

    if ($result->num_rows == 0) {
        $sql = "INSERT INTO volunteers (reg_no, name, username, password, email, role) VALUES ('$regNo', '$name', '$username', '$password', '$email', '$role')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("'.$regNo .' successfully registered as NSS Volunteer."); window.location.href = "login_in.php";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo '<script> alert("Registration number or username already exists.");window.location.href = "login_in.php"; </script>';
    }
}

}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function admin_del($id, $conn){
    include 'db.php';
    // Sanitize the input
    $id = intval($id);

    // SQL query to delete admin by ID
    $sql_del = "DELETE FROM admin WHERE id=$id";
    
    if ($conn->query($sql_del) === TRUE) {
        echo '<script>alert("Admin deleted successfully."); window.location.href = "admin_view.php";</script>';
        //echo '<script>window.location.href = "admin_view.php";</script>'; // Redirect to admin list after deletion
    } else {
        echo "Error: " . $sql_del . "<br>" . $conn->error;
    }
}

function edit_admin(){
    include 'db.php';
    // Get values from POST data
    $reg_no = $_POST['regno'];
    $name = $_POST['name'];
    $username = $_POST['uname'];
    $password = $_POST['pword'];
    $email = $_POST['email'];
    $role = 'admin';
    $mbno = $_POST['mno'];
    $dob = $_POST['dat'];
    
    // Encrypt the password
    $encrypted_password = encrypt_aes($password, ENCRYPTION_KEY);

    // Prepare the SQL statement with placeholders
    $sql = "UPDATE admin SET reg_no=?, name=?, password=?, email=?, DOB=?, Mobile_Number=?, role=?, username=? WHERE reg_no=?";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $reg_no, $name, $encrypted_password, $email, $dob, $mbno, $role, $username, $reg_no);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Admin Updated successfully.'); </script>";
        echo '<script> window.location.href = "admin_view.php" </script>';
    } else {
        echo "<script>alert('Error in Updating a Admin Record.'); </script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
function already_check() {
    global $conn; // Ensure you have access to the database connection
    $user_id = $_SESSION['usr_name'];
    $query = "SELECT * FROM volunteers_profile WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}


function volun_profile_add() {
    include 'db.php'; // Ensure this path is correct and the file contains the database connection code

    // Collect form data
    $user_id = $_SESSION['usr_name'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $year = $_POST['year'];
    $subject = $_POST['subject'];
    $mno = $_POST['mno'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $aadhaar = $_POST['aadhaar'];
    $community = $_POST['community'];
    $blood = $_POST['blood'];

    // Prepare the SQL statement
    $query = "INSERT INTO volunteers_profile (user_id, name, gender, dob, year, subject, mno, address, email, aadhaar, community, blood) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die('Error preparing the statement: ' . htmlspecialchars($conn->error));
    }

    // Bind the parameters
    $stmt->bind_param("ssssssssssss", $user_id, $name, $gender, $dob, $year, $subject, $mno, $address, $email, $aadhaar, $community, $blood);

    // Execute the statement and check for errors
    if ($stmt->execute() === false) {
        die('Error executing the statement: ' . htmlspecialchars($stmt->error));
    } else {
        // Registration successful
        echo "<script>
                alert('Registration successful!');
                location.reload();
              </script>";
    }   

    // Close the statement
    $stmt->close();
}

function volun_del($id, $conn){
    include 'db.php';
    // Sanitize the input
    $id = intval($id);

    // SQL query to delete admin by ID
    $sql_del = "DELETE FROM volunteers_profile WHERE id=$id";
    
    if ($conn->query($sql_del) === TRUE) {
        echo '<script>alert("Volunteers Detail deleted successfully."); window.location.href = "volun_view.php";</script>';
        //echo '<script>window.location.href = "admin_view.php";</script>'; // Redirect to admin list after deletion
    } else {
        echo "Error: " . $sql_del . "<br>" . $conn->error;
    }
}

function add_volun(){
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reg_nos = $_POST['regno'];
    $names = $_POST['name'];
    $years = $_POST['year'];
    $departments = $_POST['department'];

    // Prepare the SQL statement
    $sql = "INSERT INTO basic_volun (reg_no, name, year, department) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind and execute for each row
    for ($i = 0; $i < count($reg_nos); $i++) {
        $stmt->bind_param("ssis", $reg_nos[$i], $names[$i], $years[$i], $departments[$i]);
        $stmt->execute();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    echo "Records inserted successfully!";
} else {
    echo "Invalid request method.";
}
}
function attendance(){
    // Include the database connection
    include 'db.php';

    // Check if the request method is POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate and sanitize input data
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $reg_nos = $_POST['reg_no'];
        $names = $_POST['name'];
        $from_times = $_POST['from_time'];
        $to_times = $_POST['to_time'];
        $hours = $_POST['hours'];

        // Prepare the SQL statement
        $sql = "INSERT INTO attendance (reg_no, name, date, from_time, to_time, hours) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Bind parameters and execute the statement for each row
        for ($i = 0; $i < count($reg_nos); $i++) {
            $stmt->bind_param("ssssss", $reg_nos[$i], $names[$i], $date, $from_times[$i], $to_times[$i], $hours[$i]);
            $stmt->execute();
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();

        echo "Attendance recorded successfully!";
    } else {
        echo "Invalid request method.";
    }
}


function upcoming_event_post(){
    include 'db.php';
        $title = $_POST['title'];
        $description = $_POST['description'];
        $admin_id = $_SESSION['admin_id'];

        $sql = "INSERT INTO event_post (admin_id, title, description) VALUES ('$admin_id', '$title', '$description')";
    
        if ($conn->query($sql) === TRUE) {
            echo "New recruitment posted successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
function upcoming_event_respond(){
    include 'db.php';
    $recruitment_id = $_POST['recruitment_id'];
    $response = $_POST['response'];
    $volunteer_id = $_SESSION['volunteer_id']; // Assuming volunteer is logged in and their id is stored in $_SESSION['volunteer_id']

    $sql = "INSERT INTO event_post_response (event_id, volunteer_id, response) VALUES ('$recruitment_id', '$volunteer_id', '$response')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Response recorded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 
}
function upcoming_event_approve(){
    
    include 'db.php';

    $response_id = $_POST['response_id'];
    $action = $_POST['action'];

    if ($action == 'approve') {
        $approved = 'approved';
    } else if ($action == 'deny') {
        $approved = 'denied';
    } else {
        die("Error: Invalid action.");
    }

    $sql = "UPDATE event_post_response SET approved='$approved' WHERE id='$response_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Response updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location: approve_event.php");
}

function save_upcom_events() {
    include 'db.php';
    $events = $_POST['events'];

    // Clear existing events
    $conn->query("DELETE FROM upcomevents");

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO upcomevents (description) VALUES (?)");
    foreach ($events as $event) {
        $stmt->bind_param("s", $event);
        $stmt->execute();
    }
    $stmt->close();
    $conn->close();
}
function getEvents() {
    include 'db.php';

    $result = $conn->query("SELECT description FROM upcomevents");

    $events = [];
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }

    $conn->close();

    return $events;
}
?>


