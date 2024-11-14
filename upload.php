<?php
// Define the target directory where the file will be uploaded
$target_dir = "uploads/";

// Make sure the uploads directory exists
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true); // Create the directory if it doesn't exist
}

// Check if the form is submitted and a file is uploaded
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileToUpload'])) {
    // Full path of the uploaded file
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    // Check if the file was uploaded without errors
    if ($_FILES["fileToUpload"]["error"] === UPLOAD_ERR_OK) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded successfully.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, there was an error with your upload.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
    <h2>Upload File</h2>
    <!-- The form for uploading the file -->
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="fileToUpload">Choose file to upload:</label>
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <br><br>
        <input type="submit" value="Upload File">
    </form>
</body>
</html>
