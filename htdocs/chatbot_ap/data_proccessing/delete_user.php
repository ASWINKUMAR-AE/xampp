<?php
session_start();

//include '../lib/Database.php';
include 'log_activity.php';

class UserManager {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    public function deleteUser($id) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM users WHERE id = :id");
            $stmt->execute([':id' => $id]);
            return ['success' => true];
        } catch (Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}

$pdo = Database::getConnection();
$userManager = new UserManager($pdo);

$id = isset($_POST['id']) ? $_POST['id'] : null;
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if ($id) {
    $result = $userManager->deleteUser($id);
    echo json_encode($result);

    if ($result['success']) {
        logActivity("Deleted user ID: $id", $user_id);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request.']);
}
?>
