<?php
session_start();
include_once __DIR__ . '/../config/db.php';

class UserController {

    public function register($username, $password, $email, $role, $phone_number, $address, $pin_code, $instagram, $facebook) {
        global $conn;
        $hash_pass = password_hash($password, PASSWORD_BCRYPT);
        // Auto-approve all users - artists and customers
        $status = 'approved';
        $stmt = $conn->prepare("INSERT INTO users (username, password, email, role, phone_number, address, pin_code, instagram, facebook, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssss", $username, $hash_pass, $email, $role, $phone_number, $address, $pin_code, $instagram, $facebook, $status);
        return $stmt->execute();
    }

    public function login($credential, $password) {
        global $conn;
        // Updated to support either Username OR Email for login
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $credential, $credential);
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
        // Correct path to the login page (it is in auth/login.php)
        header("Location: ../auth/login.php");
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
            $_POST['phone_number'],
            $_POST['address'],
            $_POST['pin_code'],
            $_POST['instagram'],
            $_POST['facebook']
        );
    
        if ($isRegistered) {
            header("Location: ../auth/login.php");
            exit();
        } else {
            $_SESSION['register_error'] = "Registration failed. Please try again.";
            header("Location: ../auth/register.php");
            exit();
        }
    }
    
    if (isset($_POST['login'])) {
        if ($userController->login($_POST['username'], $_POST['password'])) {
            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION['login_error'] = 'Invalid login!';
            header("Location: ../auth/login.php");
            exit();
        }
    }

    if (isset($_POST['logout'])) {
        $userController->logout();
    }
}
?>
