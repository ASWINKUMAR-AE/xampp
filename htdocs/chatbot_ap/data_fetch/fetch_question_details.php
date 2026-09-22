<?php
include '../lib/Database.php';

class QuestionManager {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    public function getQuestionById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM questions WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

$pdo = Database::getConnection();
$questionManager = new QuestionManager($pdo);

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id) {
    echo json_encode($questionManager->getQuestionById($id));
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request.']);
}
?>
