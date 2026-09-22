<?php
session_start();
include_once __DIR__ . '/../db/db.php';

class UserController {

    public function register($username, $password, $email, $role, $phone_number, $address, $pin_code, $instagram, $facebook) {
        global $conn;
        $hash_pass = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO users (username, password, email, role, phone_number, address, pin_code, instagram, facebook) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $username, $hash_pass, $email, $role, $phone_number, $address, $pin_code, $instagram, $facebook);
        return $stmt->execute();
    }

    public function login($username, $password) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username']= $row['username'];

                $_SESSION['role'] = $row['role'];
                return true;
            }
        }
        return false;
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: ../views/login.php");
        exit();
    }
    
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userController = new UserController();
    
    if (isset($_POST['register'])) {
        $isRegistered = $userController->register(
            $_POST['username'],
            $_POST['password'],
            $_POST['email'],
            $_POST['role'],
            $_POST['phone_number'],  // Ensure this matches
            $_POST['address'],
            $_POST['pin_code'],       // Ensure this matches
            $_POST['instagram'],
            $_POST['facebook']
        );
    
        if ($isRegistered) {
            header("Location: ../views/login.php");
            exit();
        } else {
            echo "Registration failed. Please try again.";
        }
    }
    
    if (isset($_POST['login'])) {
        if ($userController->login($_POST['username'], $_POST['password'])) {
            header("Location: ../index.php");
            exit();
        } else {
            // Set an error message in the session
            $_SESSION['login_error'] = 'Invalid login!';
            // Redirect back to the login page
            header("Location:../views/login.php"); // Adjust the path to your login page
            exit();
        }
    }

    if (isset($_POST['logout'])) {
        $userController->logout();
    }
    if (!$stmt->execute()) {
        error_log("MySQL Error: " . $stmt->error);
        return false; // Failed registration
    }
    
}
?>
