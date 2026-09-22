<?php
header('Content-Type: application/json');
include '../lib/Database.php';

class UserManager {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    public function fetchUserDetails() {
        try {
            $stmt = $this->conn->query("SELECT * FROM stu_details ORDER BY created_at DESC");
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'users' => $users];
        } catch (Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}

$pdo = Database::getConnection();
$userManager = new UserManager($pdo);

$result = $userManager->fetchUserDetails();
echo json_encode($result);
?>
