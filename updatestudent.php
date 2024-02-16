<?php
// update_member.php

// Connect to the database
$connection = mysqli_connect("localhost", "root", "", "add_student");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_student'])) {
    // Sanitize user input
    $studentId = mysqli_real_escape_string($connection, $_POST['id']);
    $newName = mysqli_real_escape_string($connection, $_POST['name']);
    $newidnum = mysqli_real_escape_string($connection, $_POST['id_number']);
    $newemail = mysqli_real_escape_string($connection, $_POST['email']);
    $newstrand = mysqli_real_escape_string($connection, $_POST['strand']);
    $newgradesection = mysqli_real_escape_string($connection, $_POST['grade_section']);

    // Update member details in the database
    $updateQuery = "UPDATE student SET name = '$newName', id_number = '$newidnum', email = '$newemail', strand = '$newstrand', grade_section = '$newgradesection' WHERE id = '$studentId'";
    $updateResult = mysqli_query($connection, $updateQuery);

    if ($updateResult) {
        echo "<script>alert('Student updated successfully.'); window.location.href='studentinfo.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($connection) . "');</script>";
    }
}

// Close the database connection
mysqli_close($connection);
?>
