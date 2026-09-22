<?php
session_start();

// Check if the user is logged in and has the role of super admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'super admin') {
    // If not, redirect to the login page or an error page
    header('Location: login_in.php');
    exit;
}

include 'db.php';

// Fetch all responses
$sql = "SELECT r.id as response_id, r.response, r.approved, v.name as volunteer_name, v.reg_no as volunteer_reg_no, e.title as recruitment_title 
        FROM event_post_response r
        JOIN volunteers v ON r.volunteer_id = v.id
        JOIN event_post e ON r.event_id = e.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["volunteer_name"]. "<br>  Registration Number: " . $row["volunteer_reg_no"]. " <br> Event Name: " . $row["recruitment_title"]. " <br> Response: " . $row["response"]. " <br> Status: " . $row["approved"]. "<br>";
        if ($row["approved"] == 'pending') {
            echo '<form method="post" action="">
                    <input type="hidden" name="response_id" value="'.$row["response_id"].'">
                    <input type="submit" name="action" value="approve">
                    <input type="submit" name="action" value="deny">
                  </form>';
        }
    }
} else {
    echo "0 results";
}

if (isset($_POST['action'])) {
    include 'register.php';
    upcoming_event_approve();
}

