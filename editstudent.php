<?php
// Connect to the database
$connection = mysqli_connect("localhost", "root", "", "add_student");   

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_student'])) {
    // Sanitize user input
    $studentID = mysqli_real_escape_string($connection, $_POST['id']);

    // Retrieve member details for editing
    $editQuery = "SELECT * FROM student WHERE id = '$studentID'";
    $editResult = mysqli_query($connection, $editQuery);

    if ($editResult) {
        $editedStudent = mysqli_fetch_assoc($editResult);

        // Display a form for editing member details
        echo"<div class='container'>";
            echo"<div class='card'>";
                echo"<h3 class='heading-member'>Edit Student</h3>";

                echo "<form action='updatestudent.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $editedStudent['id'] . "'>";

                    echo"<div class='form-group'";
                        echo "<label for='name'>Name:</label>";
                        echo "<input type='text' name='name' value='" . $editedStudent['name'] . "'><br>";
                    echo"</div>";

                    echo"<div class='form-group'";
                        echo "<label for='id_number'>Id Number:</label>";
                        echo "<input type='text' name='id_number' value='" . $editedStudent['id_number'] . "'><br>";
                    echo"</div>";

                    echo"<div class='form-group'";
                        echo "<label for='name'>Email:</label>";
                        echo "<input type='text' name='email' value='" . $editedStudent['email'] . "'><br>";
                    echo"</div>";

                    echo"<div class='form-group'";
                        echo "<label for='strand'>Strand:</label>";
                        echo "<input type='text' name='strand' value='" . $editedStudent['strand'] . "'><br>";
                    echo"</div>";

                    echo"<div class='form-group'";
                        echo "<label for='grade_section'>Grade and Section:</label>";
                        echo "<input type='text' name='grade_section' value='" . $editedStudent['grade_section'] . "'><br>";
                    echo"</div>";
                    
                    echo"<button type='submit' name='update_student'>Update Student</button>";
                echo "</form>";
            echo"</div>";
        echo"</div>";

    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($connection);

?>