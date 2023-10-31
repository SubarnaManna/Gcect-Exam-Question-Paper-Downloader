<?php
if (isset($_POST['Filename'])) {
    $file = $_POST['Filename'].".pdf";
    $file_path ='../PDF/' . $file; // Adjust the path to your file
    if (file_exists($file_path)) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
        readfile($file_path);
        exit;
    } else {
        echo "The File you are Requested , is not found on the server.";
    }
}

?>