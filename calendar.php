<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $connection = mysqli_connect("localhost", "root", "", "calendar");

    // Check connection
    if ($connection === false) {
        die("Error: Connection error. " . mysqli_connect_error());
    }

    // Sanitize user inputs
    $name = mysqli_real_escape_string($connection, $_POST['title']);

    $id_number = mysqli_real_escape_string($connection, $_POST['date']);

    $email = mysqli_real_escape_string($connection, $_POST['description']);

    // Insert member data into the database
    $insertQuery = "INSERT INTO events (title, date, description) VALUES ('$title', '$date', '$description')";
    $result = mysqli_query($connection, $insertQuery);

    if ($result) {
        echo '<script>alert("Event added successfully.")</script>';
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    // Close the database connection
    mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addstudent.css">
    <script src="https://kit.fontawesome.com/e410dd328b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Add Event</title>
</head>
<body>
    <form action="addevents.php" method="post">
        <div class="container">
            <h2>Add School Events</h2>
            <form id="createForm" class="event-form">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required><br><br>
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required><br><br>
                <label for="description">Description:</label><br>
                <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
                <input type="submit" value="Create Event">
            </form>
        </div>
    </form>
</body>
</html>