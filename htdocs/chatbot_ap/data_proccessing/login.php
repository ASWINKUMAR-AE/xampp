<?php
session_start();
include 'log_activity.php';
require_once '../lib/Database.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($username) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'Username and Password are required.']);
        exit;
    }

    try {
        $connection = Database::getConnection();
        $query = $connection->prepare(
            "SELECT id, username, password FROM users WHERE username = :username"
        );
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user && md5($password) == $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo json_encode(['status' => 'success', 'message' => 'Login successful! Redirecting...']);
            // // Log the login activity
            logActivity("User logged in", $_SESSION['user_id']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid username or password.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

