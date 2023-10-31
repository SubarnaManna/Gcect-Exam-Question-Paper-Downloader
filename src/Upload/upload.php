<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['pdfFile'])) {
    $uploadDir = '../PDF/';
    $uploadFile = $uploadDir . basename($_FILES['pdfFile']['name']);

    $targetPath = $uploadDir . $uploadFile;
    
    // Check if the file is a PDF
    $fileType = pathinfo($targetPath, PATHINFO_EXTENSION);

    if (strtolower($fileType) !== 'pdf') {
        echo 'Error: Only PDF files are allowed.';
    }
    else if (move_uploaded_file($_FILES['pdfFile']['tmp_name'], $uploadFile)) {
        // File uploaded successfully
        echo "File is valid, and was successfully uploaded.";
    } else {
        // Error in file upload
        echo "File upload failed.";
    }
} else {
    echo "No file selected for upload.";
}
?>
