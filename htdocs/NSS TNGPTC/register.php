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
