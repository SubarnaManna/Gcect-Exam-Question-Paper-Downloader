<!DOCTYPE html>
<html>
<head>
    <title>Upload Exam Question Papers</title>
    <link rel="shortcut icon" href="../Images/college_logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/output.css">
</head>
<?php
session_start();
// $_SESSION['Admin'] = "GCECT_SUPER_USER";
// $_SESSION['Email'] = true;
// $_SESSION['time']  = time();

if (isset($_SESSION['user_id'])&&$_SESSION['user_id']=="partha.jumech@gmail.com") {
    // User is in session, you can perform actions for authenticated users here
    // $user_id = $_SESSION['user_id'];
    // $user_id = $_SESSION['user_id'];
echo '<body>
    <img src="../Images/college_logo.png" class=" w-28 m-auto h-auto mt-6" alt="GCECT LOGO">
    <p class="text-center mb-10">Govt College of Engg. & Ceramic Technology</p>
    <h1 class="text-center text-lg font-bold mt-8">Upload Semester Question Papers</h1>
    <div class="w-96 h-auto m-auto mt-6">
        <div class="border-dashed border-4 border-gray-700" id="dropArea">
            <img src="../Images/upload.png" class="w-20 h-auto m-auto mt-8" alt="uploader Icon">
            <h3 class="text-center mb-8" >Drag and Drop files here</h3>
            <input type="file" class="m-8" id="fileInput" multiple hidden>
        </div>
        <div class="w-96 h-auto bg-white my-8 rounded-md  py-3 shadow-lg shadow-indigo-500/40">
            <div class="flex items-center">
            <div class="bg-white rounded-md mx-3">
                <img src="../Images/pdf-icon.png " class=" w-16 inline-block" alt="PDF LOGO">
            </div>
            <p class=" break-words w-48"> 
                <b>Course : </b> B.Tech <br> <b>Stream : </b> CT <br> <b>Exam Year : </b> 2023 <br> <b> Semester : </b> 1st  <br> <b> Exam Type : </b> MidTerm  <br> <b>Paper Type : </b> Regular
            </p>
            <img src="../Images/green_tick.png" class="w-20" alt="">
            </div>
            <div class="ml-3 mt-2 text-red-600" id="">
                Error : File name not valid 
            </div>
            <div class="ml-3 mt-2 text-green-700" id= "">
                File uploaded succesfully.
            </div>
        </div>
        <div id="FileList"></div>
    </div>
    <div class="w-48 h-16"> </div>
    <p class="relative bottom-0  my-4 text-center text-sm text-gray-500">
        Copyright @ 2023  <br> Govt College of Engg. & Ceramic Technology  <br> All Rights Reserved 
      </p>
    
</body>
<script src="../JS/paper-uploader.js"></script>
';
    // echo "<br>User with ID $user_id is in session.";

} else {
// User is not in session, you can handle this case, e.g., redirect to a login page
    echo "<body><h1>User is not in session. Please log in.</h1></body>";
}
?>


</html>
