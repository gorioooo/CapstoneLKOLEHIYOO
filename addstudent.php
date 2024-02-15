<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $connection = mysqli_connect("localhost", "root", "", "students");

    // Check connection
    if ($connection === false) {
        die("Error: Connection error. " . mysqli_connect_error());
    }

    // Sanitize user inputs
    $name = mysqli_real_escape_string($connection, $_POST['name']);

    $id_number = mysqli_real_escape_string($connection, $_POST['id_number']);

    $email = mysqli_real_escape_string($connection, $_POST['email']);

    $strand = mysqli_real_escape_string($connection, $_POST['strand']);

    $grade_section = mysqli_real_escape_string($connection, $_POST['grade_section']);

    $username = mysqli_real_escape_string($connection, $_POST['section']);

    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Set initial status based on due date
    $status = "Active";

    // Insert member data into the database
    $insertQuery = "INSERT INTO members_list (name, id_number, email, strand, email_section, username, password) VALUES ('$name', '$id_number', '$email', '$strand', '$grade_section', '$username', '$password')";
    $result = mysqli_query($connection, $insertQuery);

    if ($result) {
        echo '<script>alert("Member added successfully.")</script>';
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

    <title>Add Student</title>
</head>
<body>
    <h2>Add Student</h2>
    <form action="addprocess.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="id_number">ID Number:</label>
        <input type="text" name="id_number" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="strand">Strand:</label>
        <input type="text" name="strand" required><br>

        <label for="grade_level">Grade Level and Section:</label>
        <input type="text" name="grade_section" required><br>

        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Add Student">
    </form>
</body>
</html>
