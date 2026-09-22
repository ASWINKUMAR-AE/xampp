<?php
//include '../lib/Database.php';
session_start();
 include 'log_activity.php'; // Include the logging script

class QuestionManager {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    public function updateQuestion($id, $question_text, $answer_text) {
        try {
            //console_log("updating question ID: " . $id);
            $stmt = $this->conn->prepare("UPDATE questions SET question_text = :question_text, answer_text = :answer_text WHERE id = :id");
            $stmt->execute([
                ':question_text' => $question_text,
                ':answer_text' => $answer_text,
                ':id' => $id
            ]);
            // // Log the activity
            logActivity("Edited question ID: $id", $_SESSION['user_id']);

            return ['success' => true];
        } catch (Exception $e) {
          //  console_log("Error: " . $e->getMessage());
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}

// Initialize database connection and QuestionManager
$pdo = Database::getConnection();
//console_log("Database Connection: " . ($pdo ? "true" : "false"));
$questionManager = new QuestionManager($pdo);

// Get the question data from the request
$id = isset($_POST['id']) ? $_POST['id'] : null;
$question_text = isset($_POST['question_text']) ? $_POST['question_text'] : null;
$answer_text = isset($_POST['answer_text']) ? $_POST['answer_text'] : null;

if ($id && $question_text && $answer_text) {
    //console_log("Updating question with ID: " . $id . ", question_text: " . $question_text . ", answer_text: " . $answer_text);
    $result = $questionManager->updateQuestion($id, $question_text, $answer_text);
    echo json_encode($result);
} else {
   // console_log("Invalid request.");
    echo json_encode(['success' => false, 'error' => 'Invalid request.']);
}
?>



