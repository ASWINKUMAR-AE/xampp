<?php
include_once "../db/db.php";

class AdminController {

    public static function getPendingArtists() {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM users WHERE role = 'artist' AND status = 'pending'");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function approveArtist($artist_id) {
        global $conn;
        $stmt = $conn->prepare("UPDATE users SET status = 'approved' WHERE id = ?");
        $stmt->bind_param("i", $artist_id);
        return $stmt->execute();
    }
    
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminController = new AdminController();
    
    if (isset($_POST['approve'])) {
        $adminController->approveArtist($_POST['artist_id']);
        header("Location: ../views/admin_dashboard.php");
    }
}
?>
