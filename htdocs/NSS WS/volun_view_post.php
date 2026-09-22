<link rel="stylesheet" href="event_post.css">
<?php

session_start();

// Check if the user is logged in and has the role of super admin
if ($_SESSION['role'] !== 'volunteer') {
    // If not, redirect to the login page or an error page
    header('Location: login_in.php');
    exit;
}


include 'db.php';

// Fetch all recruitments
$sql = "SELECT * FROM event_post";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Title: " . $row["title"]. " - Description: " . $row["description"]. "<br>";
        echo '<form method="post" action="">
                <input type="hidden" name="recruitment_id" value="'.$row["id"].'">
                <input type="radio" name="response" value="interested"> Interested
                <input type="radio" name="response" value="not_interested"> Not Interested
                <input type="submit" name="submit" value="Submit">
              </form>';
    }
} else {
    echo "0 results";
}
if (isset($_POST['submit'])) {
    include 'register.php';
    upcoming_event_respond();
}
?>
