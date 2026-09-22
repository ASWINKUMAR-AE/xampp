<?php
session_start();

//include '../lib/Database.php';
include 'log_activity.php';

class UserManager {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    public function getUserById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $username) {
        try {
            $stmt = $this->conn->prepare("UPDATE users SET username = :username WHERE id = :id");
            $stmt->execute([
                ':username' => $username,
                ':id' => $id
            ]);
            return ['success' => true];
        } catch (Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}

$pdo = Database::getConnection();
$userManager = new UserManager($pdo);

$id = isset($_POST['id']) ? $_POST['id'] : null;
$username = isset($_POST['username']) ? $_POST['username'] : null;
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if ($id && $username) {
    // Get the original user data
    $originalUser = $userManager->getUserById($id);

    $result = $userManager->updateUser($id, $username);
    echo json_encode($result);

    if ($result['success']) {
        // Log the activity with detailed changes
        $details = [
            'original' => $originalUser,
            'updated' => ['username' => $username]
        ];
        logActivity("Edited user ID: $id", $user_id, $details);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request.']);
}
?>
