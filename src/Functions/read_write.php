<?php
// Define the PHP code you want to write to the new PHP file

function get_Set(){
    $weekdayNumber = date('N');
    $set = (int)$weekdayNumber%3 ;
    $currentTime = date('H'); // 24-hour format
    if((int)$currentTime <= 2 ){
        $newset = [2,0,1];
        return $newset[$set];
    }else{
        return $set ; 
    }
}

function Destroy_OTP_Data(){
    $weekdayNumber = date('N');
    $set = (int)$weekdayNumber%3 ; 
    $delete_set = [1,2,0];
    $PhpFolderName = "../Database/OTP/Day-".$delete_set[$set]."/";
    $directory = $PhpFolderName; // Replace with the path to your folder

    if (is_dir($directory)) {
        $files = scandir($directory);
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                $filePath = $directory . DIRECTORY_SEPARATOR . $file;
                if (is_file($filePath)) {
                    if (unlink($filePath)) {
                        echo "Deleted: $file<br>";
                    } else {
                        echo "Failed to delete: $file<br>";
                    }
                }
            }
        }
    } else {
        echo "The directory does not exist.";
    }
}

function write_current_date(){
    $currentDate = date('Y-m-d'); // Output format: YYYY-MM-DD
    $data = array("Date" => $currentDate,);
    $jsonString = json_encode($data);
    file_put_contents('../Config/data.json', $jsonString); // Save the JSON string to a file
}

function Write_OTP($session_id,$OTP) {

    $currentDate = date('Y-m-d'); // Output format: YYYY-MM-DD
    $jsonString = file_get_contents('../Config/data.json'); // Replace 'data.json' with your JSON file
    $data = json_decode($jsonString, true); // Pass true to get an associative array
    if($currentDate != $data->Date){
        write_current_date();
        Destroy_OTP_Data();
    }

    $set = get_Set();
    $newPhpFileName = "../Database/OTP/Day-".$set."/".$session_id."_otp.php";

    $newPhpCode = '<?php // '.$OTP.' // ?>';
    // si : 8 , ei : 13
    
    // Open the new PHP file for writing
    /*$file = fopen($newPhpFileName, 'w');*/
    $file = fopen($newPhpFileName, 'w');
    // Check if the file was opened successfully
    if ($file) {
    // Write the PHP code to the new file
    fwrite($file, $newPhpCode);
    // Close the file
    fclose($file);
    // echo "PHP file created and written successfully!";
    echo true;
} else {
    // echo "Failed to create or open the new PHP file for writing.";
    echo false;
}
} 

function get_OTP($session_id){
    $set = get_Set();
    $fileName = "../Database/OTP/Day-".$set."/".$session_id."_otp.php";
    // Read the entire file into a string
    $fileContent = file_get_contents($fileName);
    $words = explode('//', $fileContent); // Split the text into an array of words
    // To get a specific word, you can access the array by index
    $wordIndex = 1; // Index starts from 0
    if (isset($words[$wordIndex])) {
        $specificWord = $words[$wordIndex];
        echo $specificWord;
    } else {
        echo false;
    }
}

?>