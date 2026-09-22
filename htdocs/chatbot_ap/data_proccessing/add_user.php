<?php
session_start();

//include '../lib/Database.php';
include 'log_activity.php';

class UserManager {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    public function addUser($username, $password) {
        try {
            $hashed_password = md5($password);
            $stmt = $this->conn->prepare("INSERT INTO users (username, password, created_at) VALUES (:username, :password, NOW())");
            $stmt->execute([
                ':username' => $username,
                ':password' => $hashed_password
            ]);
            return ['success' => true];
        } catch (Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}

$pdo = Database::getConnection();
$userManager = new UserManager($pdo);

$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if ($username && $password) {
    $result = $userManager->addUser($username, $password);
    echo json_encode($result);

    if ($result['success']) {
        logActivity("Added new user: $username", $user_id);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request.']);
}
?>
