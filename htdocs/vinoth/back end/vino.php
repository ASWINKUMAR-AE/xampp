<?php
// db.php - Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_booking";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
// process_booking.php - Process Hotel Booking
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $guests = $_POST['guests'];

    // Insert booking details into database
    $sql = "INSERT INTO bookings (full_name, email, mobile, check_in, check_out, guests) 
            VALUES ('$full_name', '$email', '$mobile', '$check_in', '$check_out', '$guests')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking Successful!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<?php
// fetch_bookings.php - Fetch All Bookings
include 'db.php';

$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
$bookings = [];

while ($row = $result->fetch_assoc()) {
    $bookings[] = $row;
}

echo json_encode($bookings);
?>

<?php
// cancel_booking.php - Cancel a Booking
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST['booking_id'];
    $sql = "DELETE FROM bookings WHERE id='$booking_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Booking Cancelled!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
