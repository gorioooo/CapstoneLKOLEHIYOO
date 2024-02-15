<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="studentinfo.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<title>Calendar Events</title>
</head>
<body>

<h2>Calendar Events</h2>
<?php
// Connect to the database
$connection = mysqli_connect("localhost", "root", "", "calendar");

// Retrieve member data
$query = "SELECT * FROM events";
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
          echo '<th>Title</th>';
          echo '<th>Date</th>';
          echo '<th>Description</th>';
          echo '</tr>';
        echo '</thead>';
      echo '<tbody>';

      foreach ($membersData as $row) {
          echo '<tr>';
          echo '<td>' . $row['title'] . '</td>';
          echo '<td>' . $row['date'] . '</td>';
          echo '<td>' . $row['description'] . '</td>';
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
