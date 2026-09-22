<?php
include '../lib/Database.php';

class ActivityLogger {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    public function getActivityLogs() {
        try {
            $stmt = $this->conn->query("SELECT id, action, user_id, user_ip, timestamp FROM activity_logs ORDER BY timestamp DESC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return [];
        }
    }
}

// Initialize database connection and ActivityLogger
$pdo = Database::getConnection();
$activityLogger = new ActivityLogger($pdo);

echo json_encode($activityLogger->getActivityLogs());
?>
