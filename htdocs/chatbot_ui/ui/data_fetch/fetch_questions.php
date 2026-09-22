<?php
require_once '../lib/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rawData = file_get_contents("php://input");
    $requestData = json_decode($rawData, true);

    $questionId = isset($requestData['question_id']) ? intval($requestData['question_id']) : null;
    $parentQuestionId = isset($requestData['parent_question_id']) ? intval($requestData['parent_question_id']) : null;

    try {
        $connection = Database::getConnection();
        if ($questionId) {
            $query = $connection->prepare(
                "SELECT id, question_text, answer_text 
                 FROM questions 
                 WHERE id = :questionId"
            );
            $query->bindParam(':questionId', $questionId, PDO::PARAM_INT);
            $query->execute();
            $question = $query->fetch(PDO::FETCH_ASSOC);

            if ($question) {
                // Fetch related questions
                $relatedQuery = $connection->prepare(
                    "SELECT id, question_text 
                     FROM questions 
                     WHERE parent_question_id = :questionId"
                );
                $relatedQuery->bindParam(':questionId', $questionId, PDO::PARAM_INT);
                $relatedQuery->execute();
                $relatedQuestions = $relatedQuery->fetchAll(PDO::FETCH_ASSOC);

                echo json_encode([
                    'success' => true,
                    'questions' => [$question],
                    'related_questions' => $relatedQuestions
                ], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
            } else {
                echo json_encode(['success' => false, 'message' => 'No answer found.']);
            }
        } else {
            $query = $connection->prepare(
                "SELECT id, question_text 
                 FROM questions 
                 WHERE parent_question_id IS NULL OR parent_question_id = :parentQuestionId"
            );
            $query->bindParam(':parentQuestionId', $parentQuestionId, PDO::PARAM_INT);
            $query->execute();
            $questions = $query->fetchAll(PDO::FETCH_ASSOC);

            echo json_encode(['success' => true, 'questions' => $questions], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>