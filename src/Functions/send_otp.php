<?php
function SEND_Email_OTP($Email,$OTP){
    $to = $Email;
    $subject = "Examination Question Paper Download OTP Verification";
    $message = "
    \n To complete the login process, please enter the following One-Time Password (OTP) on the login page:

    \n **Verification code: $OTP**

    \n This OTP will be valid for a limited time, so please make sure to use it promptly.

    \n Thank you for choosing GCECT for your education. We look forward to assisting you further.

    \n Govt. College of Engineering and Ceramic Technology. 
    
    \n 73, Abinash Chandra Banerjee Lane Kolkata-700 010 ";

    

    $headers = "From:  gcectwb@gmail.com";
    
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully to $to";
    } else {
        echo "Email delivery failed";
    }
}
?>