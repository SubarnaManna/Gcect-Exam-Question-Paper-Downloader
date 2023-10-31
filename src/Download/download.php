<?php
// $file = $_GET['Filename'] .".pdf" ;
// header("content-disposition: attachment; filename=../PDF/". urlencode($file));
// $fb = fopen($file, "r");
// while(!feof($fb)){
// }
// echo fread($fb, 8192); flush();
// fclose($fb);


session_start();
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['email'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (isset($_POST['Filename'])) {
    $file = $_POST['Filename'].".pdf";
    // $file_path = __DIR__ . '../PDF/' . $file; // Adjust the path to your file
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
}else{
    echo "<h1>Bad Request</h1>";
}
?>