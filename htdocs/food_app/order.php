<?php
$mysqli = new mysqli("localhost", "root", "", "food_delivery");
if ($mysqli->connect_error) {
    die("DB Error");
}

$name = $_POST['customer'];
$items = $_POST['items'];
$total = $_POST['total'];

$stmt = $mysqli->prepare("INSERT INTO orders (customer_name, items, total) VALUES (?, ?, ?)");
$stmt->bind_param("ssd", $name, $items, $total);
if ($stmt->execute()) {
    echo "OK";
} else {
    echo "ERROR";
}
?>
