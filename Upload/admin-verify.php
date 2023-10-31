<?php
session_start(); // Start a new session or resume the existing session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["email"];
    $password = $_POST["Password"];

    // Replace these with your actual username and password verification logic
    $validUsername = "partha.jumech@gmail.com";
    // subrotosarkar32@gmail.com => Github share
    $validPassword = "svDk#4@23!Sx.0";

    if ($username === $validUsername && $password === $validPassword) {
        $_SESSION["user_id"] = $username; // Store the username in the session
        header("Location: uploader.php"); // Redirect to the dashboard page
        exit();
    } else {
        echo "Invalid credentials. Please try again.";
    }
}
?>
