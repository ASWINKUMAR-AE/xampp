<?php
include_once __DIR__ . '/../config/db.php';

class ArtController {

    public function uploadArt($artist_id, $title, $description, $image_url) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO artworks (artist_id, title, description, image_url) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $artist_id, $title, $description, $image_url);
        return $stmt->execute();
    }

    public static function getApprovedArt() {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM artworks WHERE status = 'approved'");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    
    // Function to get art uploaded by a specific artist
    public function getArtByArtistId($artist_id) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM artworks WHERE artist_id = ?");
        $stmt->bind_param("i", $artist_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    
    public function deleteArt($artId) {
        global $conn; // Ensure you have access to the database connection

        // First, retrieve the image URL from the database
        $sql = "SELECT image_url FROM artworks WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $artId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $art = $result->fetch_assoc();
            $imagePath = $art['image_url']; // Get the image path

            // Delete the file from the server
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the file
            }

            // Now delete the record from the database
            $sqlDelete = "DELETE FROM artworks WHERE id = ?";
            $stmtDelete = $conn->prepare($sqlDelete);
            $stmtDelete->bind_param("i", $artId);
            return $stmtDelete->execute();
        } else {
            // Handle case where no art is found
            return false;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['upload'])) {
        $artController = new ArtController();
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["art_image"]["name"]);
        
        if (move_uploaded_file($_FILES["art_image"]["tmp_name"], $target_file)) {
            $artController->uploadArt($_POST['artist_id'], $_POST['title'], $_POST['description'], $target_file);
            header("Location: ../views/artist_dashboard.php");
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload_artist_data'])) {
    $artistId = $_POST['artist_id'];
    $artistName = $_POST['artistName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone_number'];
    $address = $_POST['address'];
    $instagram = $_POST['instagram'];
    $facebook = $_POST['facebook'];

    // Prepare SQL statement to insert or update artist data
    $sql = "UPDATE users SET 
                username = ?, 
                email = ?, 
                phone_number = ?, 
                address = ?, 
                instagram = ?, 
                facebook = ? 
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $artistName, $email, $phoneNumber, $address, $instagram, $facebook, $artistId);

    if ($stmt->execute()) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Artist data uploaded successfully!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Redirect back to the previous page
    header("Location: ../views/artist_dashboard.php");
    exit();
}
?>
