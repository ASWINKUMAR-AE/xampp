<?php
header('Content-Type: application/json');
include '../lib/Database.php';

class UserManager {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    public function storeUserDetails($name, $email, $mobile) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO stu_details (name, email, mobile) VALUES (:name, :email, :mobile)");
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':mobile' => $mobile
            ]);
            return ['success' => true];
        } catch (Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}

$pdo = Database::getConnection();
$userManager = new UserManager($pdo);

$data = json_decode(file_get_contents('php://input'), true);
$name = isset($data['name']) ? $data['name'] : null;
$email = isset($data['email']) ? $data['email'] : null;
$mobile = isset($data['mobile']) ? $data['mobile'] : null;

if ($name && $email && $mobile) {
    $result = $userManager->storeUserDetails($name, $email, $mobile);
    echo json_encode($result);
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid input.']);
}
?>
