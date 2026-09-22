<!DOCTYPE html>
<html>
<head>
    <title>Enter Upcoming Events</title>
</head>
<body>  
    <h1>Enter Upcoming Events</h1>
    <form action="" method="post">
        <label for="event1">Event 1:</label>
        <input type="text" id="event1" name="events[]"><br><br>
        <label for="event2">Event 2:</label>
        <input type="text" id="event2" name="events[]"><br><br>
        <label for="event3">Event 3:</label>
        <input type="text" id="event3" name="events[]"><br><br>
        <label for="event4">Event 4:</label>
        <input type="text" id="event4" name="events[]"><br><br>
        <label for="event5">Event 5:</label>
        <input type="text" id="event5" name="events[]"><br><br>
        <input type="submit" name="event_submit" value="Save Events">
    </form>
</body>
</html>

<?php 
if (isset($_POST['event_submit'])) {
    include 'register.php';
    save_upcom_events();
    echo "<script>alert('Events saved successfully');</script>";
  //  header("Location: display_events.php");
    exit();
}
 ?>