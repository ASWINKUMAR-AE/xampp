<?php
include '../lib/Database.php';

function fetchQuestions($parent_id = null, $conn) {
    $query = "SELECT * FROM questions WHERE parent_question_id " . ($parent_id ? "= :parent_id" : "IS NULL");
    $stmt = $conn->prepare($query);
    if ($parent_id) $stmt->bindParam(':parent_id', $parent_id, PDO::PARAM_INT);
    $stmt->execute();

    $questions = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $row['children'] = fetchQuestions($row['id'], $conn);
        $questions[] = $row;
    }
    return $questions;
}

try {
    $conn = Database::getConnection();
    echo json_encode(fetchQuestions(null, $conn));
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>

