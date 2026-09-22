<?php
include '../lib/Database.php';

class UserManager {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    public function getUsers() {
        try {
            $stmt = $this->conn->query("SELECT id, username, created_at FROM users ORDER BY created_at DESC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return [];
        }
    }
}

$pdo = Database::getConnection();
$userManager = new UserManager($pdo);

echo json_encode($userManager->getUsers());
?>
