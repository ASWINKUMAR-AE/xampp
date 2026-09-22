<?php 
include 'db.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // MongoDB ObjectID conversion
        $studentId = new MongoDB\BSON\ObjectId($id);
        
        $deleteResult = $students->deleteOne(['_id' => $studentId]);

        if ($deleteResult->getDeletedCount() > 0) {
            header("Location: view_students.php?msg=deleted");
            exit();
        } else {
            echo "Student not found.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: view_students.php");
    exit();
}
?>
