<?php
session_start(); // Start or resume the session

require_once("../Functions/read_write.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // $session_id = $_POST['session_id'];

    // Get the current session ID
    $sessionId = session_id();

    $userOTP = $_POST['OTP'];
    $Server_OTP = get_OTP($session_Id);

    if((int)$userOTP == (int)$Server_OTP){

        session_start();
        $_SESSION["NEW_SESSION_ID"] = "";
        header("Location: download_Page.php"); // Redirect to the dashboard page
        exit();
    
    }else {
        echo "Invalid credentials. Please try again.";
    }

}

?>
