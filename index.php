<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./Images/college_logo.ico" type="image/x-icon">
    <title>Download GCECT Question Papers</title>
    <link rel="stylesheet" href="./CSS/output.css">
</head>
<body class="bg-gray-100">
  <div class="flex justify-center items-center h-auto">
        <div class="bg-white p-6 rounded shadow w-96">
          <img class="mx-auto h-20 w-auto" src="./Images/college_logo.png" alt="GCECT">
          <h1 class="text-2xl font-bold mb-3 mt-4">Semester End Examination Question Papers</h1>
            <h2 class="text-xl font-semibold mb-2">Course</h2>
            <select class="px-2 py-2 inline-block min-w-full  mb-5"  name="__Course" id="Course">
                <option value="B.Tech">B.Tech</option>
                <option value="M.Tech">M.Tech</option>
            </select>
            <h2 class="text-xl font-semibold mb-2">Stream</h2>
            <select class="px-2 py-2 inline-block min-w-full  mb-5" name="__Stream" id="Stream">
                <option value="CT">CT</option>
                <option value="IT">IT</option>
                <option value="CSE">CSE</option>
            </select>
            <h2 class="text-xl font-semibold mb-2">Semester</h2>
            <select class="px-2 py-2 inline-block min-w-full  mb-5" name="__Semester" id="Semester">
                <option value="1st">1st</option>
                <option value="2nd">2nd</option>
                <option value="3rd">3rd</option>
                <option value="4th">4th</option>
                <option value="5th">5th</option>
                <option value="6th">6th</option>
                <option value="7th">7th</option>
                <option value="8th">8th</option>
            </select>
            <h2 class="text-xl font-semibold mb-2">Year</h2>
            <select  class="px-2 py-2 inline-block min-w-full  mb-5" name="__Year" id="Year">
            </select>
            <h2 class="text-xl font-semibold mb-2">Examination</h2>
            <select class="px-2 py-2 inline-block min-w-full  mb-5" name="__Examination" id="Examination">
                <option value="M1">MidTerm-1</option>
                <option value="M2">MidTerm-2</option>
                <option value="SM1">Special MidTerm-1</option>
                <option value="SM2">Special MidTerm-2</option>
                <option value="End">End-Sem</option>
            </select>
            <div id="type-container" style="display: none;">
            <h2 class="text-xl font-semibold mb-2">Type</h2>
            <select class="px-2 py-2 inline-block min-w-full  mb-5" name="__Type" id="Type">
                <option value="R">Regular</option>
                <option value="B">BackLog</option>
            </select>
            </div>
                <form action="./Download/download.php" method="POST">
                    <input style="visibility: hidden;" name="Filename" type="text" id="filename">
                    <input style="visibility: hidden;" id="__Submit" type="submit" value="Submit">
                </form>
                <button id="Download-btn" type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400">Download</button>
        </div>
    </div>

</body>
<script>
// create Download file name 
const ID = (e)=>{return document.getElementById(e);}
const start_year = 2017 ; 
const DATE = new Date();
const this_year = DATE.getFullYear();
for (let i = start_year; i <= this_year; i++) {
    var option = document.createElement("option");
    option.value = i ; 
    option.innerText = i ; 
    document.getElementById("Year").appendChild(option);
    }
document.getElementById("Examination").addEventListener('click',()=>{
    var val = document.getElementById("Examination").value;
    console.log(val);
    if(val=="End"){
        document.getElementById("type-container").style.display="block";
    }else{
        document.getElementById("type-container").style.display="none";
    }
})
const generate_fileName = ()=>{
    var Course = ID("Course").value ; 
    var Stream = ID("Stream").value ; 
    var Semester = ID("Semester").value ; 
    var Year = ID("Year").value ; 
    var Examination = ID("Examination").value ; 
    var Type = ID("Type").value ; 
    filename =  Course+"-"+Stream+"-"+Year+"-"+Semester+"-"+Examination;
    if(Examination=="End"){
        filename = filename + "-" + Type ; 
    }
    return filename ; 
    }
    document.getElementById("Download-btn").addEventListener("click",()=>{
    var filename = generate_fileName();
    console.log(filename);
    document.getElementById("filename").value = filename;
    setTimeout(() => {
        document.getElementById("__Submit").click();        
    },2000 );
});
</script>
</html>
