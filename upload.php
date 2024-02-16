<?php
// Define the destination directory
$upload_dir = 'C:/xampp/htdocs/CapstoneLKOLEHIYOO/uploads/';

// Check if a file was uploaded
if ($_FILES['excel_file']['size'] > 0) {
    // Move the uploaded file to the destination directory
    $upload_file = $upload_dir . basename($_FILES['excel_file']['name']);
    if (move_uploaded_file($_FILES['excel_file']['tmp_name'], $upload_file)) {
        echo "File successfully uploaded.";
        
        // Now you can process the uploaded file further if needed
        // For example, you can load the Excel file using PHPExcel library and insert data into a database
    } else {
        echo "Error uploading file.";
    }
} else {
    // Handle error if no file was uploaded
    echo "Error: No file uploaded.";
}
?>
