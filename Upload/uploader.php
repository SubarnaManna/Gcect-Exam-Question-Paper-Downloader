<!DOCTYPE html>
<html>
<head>
    <title>Upload Exam Question Papers</title>
    <link rel="shortcut icon" href="../Images/college_logo.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/output.css">
</head>
<style>
    .drop-area {
    border: 2px dashed #ccc;
    padding: 20px;
    text-align: center;
    cursor: pointer;
    }

    .file-list {
        margin-top: 20px;
    }

    .file-list ul {
        list-style: none;
        padding: 0;
    }

    .file-list li {
        margin: 5px 0;
    }
</style>

<?php
session_start();
if (isset($_SESSION['user_id'])&&$_SESSION['user_id']=="partha.jumech@gmail.com") {
echo '
<body>
<img src="../Images/college_logo.png" class=" w-28 m-auto h-auto mt-6" alt="GCECT LOGO">
<p class="text-center mb-10">Govt College of Engg. & Ceramic Technology</p>
    <h1 class="text-center text-lg font-bold mt-8">Upload Semester Question Papers</h1>
    <div class="w-96 h-auto m-auto mt-6">
        <div class="border-dashed border-4 border-gray-700" id="drop-area" >
            <img src="../Images/upload.png" class="w-20 h-auto m-auto mt-8" alt="uploader Icon">
            <h3 class="text-center mb-8" >Drag and Drop files here</h3>
            <input type="file" class="m-8" id="file-input" multiple hidden>
        </div>
        <div id="file-list" class="file-list">
            <ul id="file-list-items"></ul>
        </div>
    </div>
    <div class="w-48 h-16"> </div>
    <p class="relative bottom-0  my-4 text-center text-sm text-gray-500">
        Copyright @ 2023  <br> Govt College of Engg. & Ceramic Technology  <br> All Rights Reserved 
      </p>
      </body>

      <script src="../js/uploader.js"></script>

';
    // echo "<br>User with ID $user_id is in session.";

} else {
// User is not in session, you can handle this case, e.g., redirect to a login page
    echo "<body><h1>User is not in session. Please log in.</h1></body>";
}
?>

</html>
