<?php
session_start();
include('db.php');
include('register.php'); // Assuming this contains the decrypt_aes function and ENCRYPTION_KEY definition

date_default_timezone_set('Asia/Kolkata');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $role = $_POST['role'];

    if ($role == "volunteer") {
        $username = $_POST['reg_no'];
        // Fetch user record using username
        $sql = "SELECT * FROM volunteers WHERE username='$username'";
        $result = $conn->query($sql);
        $password = md5($_POST['pwd']);
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            // Verify password and role
            if ($user['password'] == $password && $user['role'] == $role) {
                // Save login datetime
                $login_time = date('Y-m-d H:i:s');
                $update_login_time_sql = "UPDATE volunteers SET last_login='$login_time' WHERE username='$username'";
                $conn->query($update_login_time_sql);

                // Set session variables
                $_SESSION['volunteer_id']=$user['id'];
                $_SESSION['usr_name'] = $username;
                $_SESSION['role'] = $role;
                echo '<script> window.location.href = "dash_volun.php";</script>';
                exit(); // Ensure script stops executing after redirection
            } else {
                // Alert message for invalid credentials or role
                echo '<script>alert("Invalid login credentials or role."); window.location.href = "login_in.php";</script>';
            }
        } else {
            // Alert message for user not found
            echo '<script>alert("User not found."); window.location.href = "login_in.php";</script>';
        }
    } else {
        if ($role == "admin"){
            $username = $_POST['reg_no'];
            $sql = "SELECT * FROM admin WHERE reg_no='$username'";
        }
        else if($role == "super admin"){
            $username = $_POST['username'];
            $sql = "SELECT * FROM admin WHERE username='$username'";
        }
        // Fetch user record using username

        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $password_input = $_POST['pwd'];
            $password_decrypted = decrypt_aes($user['password'], ENCRYPTION_KEY);

            echo "<script>console.log('$password_decrypted')</script>"; // For debugging purposes

            // Verify password and role
            if ($password_input == $password_decrypted && $user['role'] == $role) {
                // Save login datetime
                $login_time = date('Y-m-d H:i:s');
                if ($role == "admin"){
                    $update_login_time_sql = "UPDATE admin SET last_login='$login_time' WHERE reg_no='$username'";
                 }
                else if ($role == "super admin"){
                    $_SESSION['admin_id'] = $user['id'];
                    $update_login_time_sql = "UPDATE admin SET last_login='$login_time' WHERE username='$username'";
                 }
                $conn->query($update_login_time_sql);

                // Set session variables
                $_SESSION['usr_name'] = $username;
                $_SESSION['role'] = $role;

                // Redirect based on user role
                if ($role === 'admin') {
                    header('Location: dash_volun.php');
                } else {
                    header('Location: dash_volun.php');
                }
                exit(); // Ensure script stops executing after redirection
            } else {
                // Alert message for invalid credentials or role
                echo '<script>alert("Invalid login credentials or role."); window.location.href = "login_in.php";</script>';
            }
        } else {
            // Alert message for user not found
            echo '<script>alert("User not found."); window.location.href = "login_in.php";</script>';
         }
    }
}
?>