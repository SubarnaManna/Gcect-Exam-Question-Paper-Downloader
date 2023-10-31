<?php
    // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['time'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDirectory = "../uploads/"; // Create a directory named "uploads" in your project directory

    // Check if the directory exists, if not, create it
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0755, true);
    }

    $targetFile = $targetDirectory . basename($_FILES["pdf-file"]["name"]);

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo "File already exists.";
    } else {
        if (move_uploaded_file($_FILES["pdf-file"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["pdf-file"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
