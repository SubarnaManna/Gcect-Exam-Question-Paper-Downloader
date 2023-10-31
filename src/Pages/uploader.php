<?php
$uploadDir = '../uploads/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_FILES['pdf-file']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['pdf-file']['tmp_name'];
    $filename = basename($_FILES['pdf-file']['name']);
    $targetPath = $uploadDir . $filename;
    
    // Check if the file is a PDF
    $fileType = pathinfo($targetPath, PATHINFO_EXTENSION);
    if (strtolower($fileType) !== 'pdf') {
        echo 'Error: Only PDF files are allowed.';
    } else {
        if (move_uploaded_file($file, $targetPath)) {
            echo 'File uploaded successfully: ' . $filename;
        } else {
            echo 'Error: Failed to move file to the server.';
        }
    }
} else {
    echo 'Error: File upload failed. Error code: ' . $_FILES['pdf-file']['error'];
}
?>
