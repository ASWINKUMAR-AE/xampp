<?php
$mysqli = new mysqli("localhost", "root", "", "food_delivery");
if ($mysqli->connect_error) {
    die("DB Error");
}
$result = $mysqli->query("SELECT name, price FROM menu");
while ($row = $result->fetch_assoc()) {
    echo $row['name'] . "," . $row['price'] . "\n";
}
?>
