<?php
include 'db_config.php';

$title = $_POST['title'];
$date = $_POST['date'];
$description = $_POST['description'];

$sql = "INSERT INTO events (title, date, description) VALUES ('$title', '$date', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "Event created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
