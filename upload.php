<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Import Excel to MySQL</title>
</head>
<body>
  <form class="" action="" enctype="multipart/form-data" method="post">
   <input type="file" name="excel" required value="">  
   <button type="submit" name="import">Import</button>
  </form>
  <table border="1">
    <tr>
       <td>#</td>
       <td>Name</td>
       <td>Id_number</td>
       <td>Email</td>
       <td>Strand</td>
       <td>Grade_Section</td>
       <td>Username</td>
       <td>Password</td>
    </tr>
    <?php
    $i = 1;
    $rows = mysqli_query($conn, "SELECT * FROM students");
    foreach($rows as $row) :
    ?>
    <tr>
     <td> <?php echo $i++; ?> </td>
     <td> <?php echo $row["name"]; ?> </td>
     <td> <?php echo $row["id_number"]; ?> </td>
     <td> <?php echo $row["email"]; ?> </td>
     <td> <?php echo $row["strand"]; ?> </td>
     <td> <?php echo $row["grade_section"]; ?> </td>
     <td> <?php echo $row["username"]; ?> </td>
     <td> <?php echo $row["password"]; ?> </td>
    </tr>
    <?php endforeach; ?>
  </table> 

  <?php
  if(isset($_POST["import"])){
    $fileName = $_FILES["excel"]["name"];
    $fileExtension = explode('.', $fileName);
    $fileExtension = strtolower(end($fileExtension));

    $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

    $targetDirectory = "uploads/" . $newFileName;
    move_uploaded_file($_FILES["excel"]["tmp_name"], $targetDirectory);

    error_reporting(0);
    ini_set('display_errors', 0);

    require "excelReader/excel_reader2.php";
    require "excelReader/SpreadsheetReader.php";

    $reader = new SpreadsheetReader($targetDirectory);
    foreach($reader as $key => $row){
     $name = $row[0];
     $age = $row[1];
     $country = $row[2];
     // Adjusted column names and added placeholders for id, username, and password
     mysqli_query($conn, "INSERT INTO tb_data (name, id_number, email, strand, email_section, username, password) VALUES ('$name', '$age', '$country', '', '', '', '', '', '')");
    }

    echo
    "
    <script>
    alert('Successfully Import');
    document.location.href = '';
    </script> 
    ";
  }
  ?>
</body>
</html>
