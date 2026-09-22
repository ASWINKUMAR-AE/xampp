<?php
session_start();

//include '../lib/Database.php';
include 'log_activity.php'; // Include the logging script

class QuestionManager {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    public function addQuestion($question_text, $answer_text, $parent_question_id) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO questions (question_text, answer_text, parent_question_id) VALUES (:question_text, :answer_text, :parent_question_id)");
            $stmt->execute([
                ':question_text' => $question_text,
                ':answer_text' => $answer_text,
                ':parent_question_id' => $parent_question_id
            ]);
            $inserted_id = $this->conn->lastInsertId();
            return ['success' => true, 'inserted_id' => $inserted_id];
        } catch (Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}

// Initialize database connection and QuestionManager
$pdo = Database::getConnection();
$questionManager = new QuestionManager($pdo);

// Get the question data from the request
$question_text = isset($_POST['question_text']) ? $_POST['question_text'] : null;
$answer_text = isset($_POST['answer_text']) ? $_POST['answer_text'] : null;
$parent_question_id = isset($_POST['parent_question_id']) ? $_POST['parent_question_id'] : null;

// Ensure parent_question_id is set to null if it's an empty string
$parent_question_id = empty($parent_question_id) ? null : $parent_question_id;

if ($question_text && $answer_text) {
    $result = $questionManager->addQuestion($question_text, $answer_text, $parent_question_id);
    echo json_encode($result);

    // Log the activity if the question is successfully added
    if ($result['success']) {
        $action = "Added New Question: " . $question_text . " with answer: " . $answer_text;
        if ($parent_question_id) {
            $action .= " which is a child of Question ID: " . $parent_question_id;
        } else {
            $action .= " which is a parent question";
        }
        logActivity($action, $_SESSION['user_id'], $result['inserted_id']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request.']);
}
?>

