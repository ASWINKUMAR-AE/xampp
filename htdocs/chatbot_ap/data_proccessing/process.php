<?php
require_once '../data_fetch/db.php';

$data = json_decode(file_get_contents("php://input"), true);
$userMessage = isset($data['userMessage']) ? $data['userMessage'] : '';
try {
    $db = Database::getInstance()->getConnection();
    $stmt = $db->prepare("SELECT answer FROM chatbot_responses WHERE question = :question");
    $stmt->bindParam(":question", $userMessage);
    $stmt->execute();

    $response = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode(["response" => isset($response['answer']) ? $response['answer'] : "Sorry, I don’t know how to respond to that."]);
} catch (PDOException $e) {
    echo json_encode(["error" => "Database error: " . $e->getMessage()]);
}
?>