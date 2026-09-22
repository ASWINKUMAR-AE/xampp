<?php
session_start();

//include '../lib/Database.php';
 include 'log_activity.php'; // Include the logging script

class QuestionManager {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    public function deleteQuestion($id) {
        try {
            $this->conn->beginTransaction();

            // Get the question and answer text before deleting
            $stmt = $this->conn->prepare("SELECT question_text, answer_text FROM questions WHERE id = :id");
            $stmt->execute([':id' => $id]);
            $question = $stmt->fetch(PDO::FETCH_ASSOC);

            // Recursive function to delete child questions
            $this->deleteChildQuestions($id);

            // Delete parent question
            $stmt = $this->conn->prepare("DELETE FROM questions WHERE id = :id");
            $stmt->execute([':id' => $id]);

            $this->conn->commit();
            logActivity("Deleted Parent Question ID: $id", $_SESSION['user_id'], $id);

            return ['success' => true];
        } catch (Exception $e) {
            $this->conn->rollBack();
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    private function deleteChildQuestions($parentId) {
        $stmt = $this->conn->prepare("SELECT id FROM questions WHERE parent_question_id = :parentId");
        $stmt->execute([':parentId' => $parentId]);
        $childQuestions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($childQuestions as $childQuestion) {
            $stmt = $this->conn->prepare("SELECT question_text, answer_text FROM questions WHERE id = :id");
            $stmt->execute([':id' => $childQuestion['id']]);
            $childQuestion = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->deleteChildQuestions($childQuestion['id']); // Recursively delete child questions
            $stmt = $this->conn->prepare("DELETE FROM questions WHERE id = :id");
            $stmt->execute([':id' => $childQuestion['id']]);

            logActivity("Deleted Child Question: $id " . $childQuestion['question_text'] . " with answer: " . $childQuestion['answer_text'], $_SESSION['user_id'], $childQuestion['id']);
        }
    }
}

// Initialize database connection and QuestionManager
$pdo = Database::getConnection();
$questionManager = new QuestionManager($pdo);

// Get the question ID from the request
$id = isset($_POST['id']) ? $_POST['id'] : null;
if ($id) {
    $result = $questionManager->deleteQuestion($id);
    echo json_encode($result);

} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request.']);
}
?>

