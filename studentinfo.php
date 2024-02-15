<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="studentinfo.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<title>Student Information</title>
</head>
<body>

<h2>Student Information</h2>

<?php
// Connect to the database
$connection = mysqli_connect("localhost", "root", "", "add_student");

// Retrieve member data
$query = "SELECT * FROM student";
$result = mysqli_query($connection, $query);

if ($result) {
  if ($result->num_rows > 0) {
      $membersData = array(); // Array to store member data

      while ($row = $result->fetch_assoc()) {
          $membersData[] = $row; // Store each row in the array
      }

      echo '<table class="table table-striped">';
        echo '<thead>';
          echo '<tr>';
          echo '<th>Name</th>';
          echo '<th>Id Number</th>';
          echo '<th>Email</th>';
          echo '<th>Strand</th>';
          echo '<th>Grade and Section</th>';
          echo '<th>Username</th>';
          echo '<th>Password</th>';
          echo '</tr>';
        echo '</thead>';
      echo '<tbody>';

      foreach ($membersData as $row) {
          echo '<tr>';
          echo '<td>' . $row['name'] . '</td>';
          echo '<td>' . $row['id_number'] . '</td>';
          echo '<td>' . $row['email'] . '</td>';
          echo '<td>' . $row['strand'] . '</td>';
          echo '<td>' . $row['grade_section'] . '</td>';
          echo '<td>' . $row['username'] . '</td>';
          echo '<td>' . $row['password'] . '</td>';

          echo '</tr>';
      }

      echo '</tbody>';
      echo '</table>';

      echo "<div class='divider'></div>";
  } else {
      echo "<p>No members found.</p>";
  }
  mysqli_free_result($result);
} else {
  echo "<p>Error: " . mysqli_error($connection) . "</p>";
}
?>
</body>
</html>
