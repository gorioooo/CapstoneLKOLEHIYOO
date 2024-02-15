<?php
include 'db_config.php';

$id = $_POST['id'];
$title = $_POST['title'];
$date = $_POST['date'];
$description = $_POST['description'];

$sql = "UPDATE events SET title='$title', date='$date', description='$description' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Event updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
