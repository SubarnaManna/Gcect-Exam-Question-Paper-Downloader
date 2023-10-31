<?php
require_once("../Functions/send_otp.php");
require_once("../Functions/read_write.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

// collect value of input field
// $name = $_POST['fname'];
// if (empty($name)) {

$email = $_POST['email'];
$session_Id = $_POST['__Session_id'];
// $OTP = rand(100000,999999);
$OTP = 552366;
// $sessionId = session_id();
// $_SESSION['Id']

Write_OTP($session_Id, $OTP);
echo "otp generated";
// SEND_Email_OTP( $email, $OTP);

}
?>