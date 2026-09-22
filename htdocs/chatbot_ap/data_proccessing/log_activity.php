<?php
include '../lib/Database.php';

class ActivityLogger {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    public function log($action, $user_id, $user_ip) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO activity_logs (action, user_id, user_ip) VALUES (:action, :user_id, :user_ip)");
            $stmt->execute([
                ':action' => $action,
                ':user_id' => $user_id,
                ':user_ip' => $user_ip
            ]);
        } catch (Exception $e) {
            // Handle exception or log the error
        }
    }
}
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // Convert ::1 to 127.0.0.1 for local development
        return $_SERVER['REMOTE_ADDR'] === '::1' ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
    }
}
    
function logActivity($action, $user_id) {
    $pdo = Database::getConnection();
    $activityLogger = new ActivityLogger($pdo);
    $user_ip = getUserIP();
    $activityLogger->log($action, $user_id, $user_ip);
}
