<?php
include 'db.php';

if (isset($_GET['reg_no'])) {
    $reg_no = $_GET['reg_no'];
    $sql = "SELECT * FROM basic_volun WHERE reg_no LIKE ?";
    $stmt = $conn->prepare($sql);
    $search_term = "%" . $reg_no . "%";
    $stmt->bind_param("s", $search_term);
    $stmt->execute();
    $result = $stmt->get_result();
    $students = [];
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    echo json_encode($students);
    $stmt->close();
}

$conn->close();
?>
