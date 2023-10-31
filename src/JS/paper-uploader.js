    function uploadFile() {
            var fileInput = document.getElementById('pdf-file');
            var file = fileInput.files[0];
            var formData = new FormData();
            formData.append('pdf-file', file);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'uploader.php', true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('status').innerHTML = xhr.responseText;
                    fileInput.value = ''; // Clear the file input
                }
            };

            xhr.send(formData);
        }

    const dropArea = document.getElementById("dropArea");
    const fileInput = document.getElementById("fileInput");
    const FileList = document.getElementById("FileList");

    dropArea.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropArea.classList.add("active");
        console.log("Dragover");
    });

    dropArea.addEventListener("dragleave", () => {
        dropArea.classList.remove("active");
        console.log("Dragleave");
    });

    dropArea.addEventListener("drop", (e) => {
        e.preventDefault();
        dropArea.classList.remove("active");
        console.log("Drop");
        const files = e.dataTransfer.files;

        handleFiles(files);
    });

    fileInput.addEventListener("change", (e) => {
        const files = e.target.files;
        handleFiles(files);
    });
    const FileDataObj = {
    "Course":["B.Tech","M.Tech"],
    "Stream":["CSE","IT","CT"],
    "Semester":["1st","2nd","3rd","4th","5th","6th","7th","8th"],
    "Exam_Type":["Special MidTerm-1","Special MidTerm-2","MidTerm-1","MidTerm-2","Semester-End"],
    "Exam_in_File":["SM1","SM2","M1","M2","End"],
    "Paper_in_File":["R","B"],
    "Paper_Type":["Regular","Backlog"]
    }
    const getFileData = (file)=>{
        var name = file.name.split(".pd")[0].split("-");
        console.log(file);
        let obj = {};
        obj.error = false ; 
            if (FileDataObj.Course.includes(name[0])){
                obj.Course = name[0] ;
            }else{
                Obj.error = true ; 
            }
            if (FileDataObj.Stream.includes(name[1])) {
                obj.Stream = name[1] ;
            } else {
                Obj.error = true ; 
            }
            try {
            if(isNaN(JSON.parse(name[2]))){
                Obj.error = true ; 
            }else{
                obj.year = name[2];
            }                
            } catch (e) {
                Obj.error = true ; 
            }

            if (FileDataObj.Semester.includes(name[3])) {
                obj.Semester=name[3];
            } else {
                Obj.error = true ; 
            }
            if (FileDataObj.Exam_in_File.includes(name[4])) {
                obj.Exam_Type=FileDataObj.Exam_Type[FileDataObj.Exam_in_File.indexOf(name[4])];
            } else {
                Obj.error = true ; 
            }
            if (name.length ===6){
                if (FileDataObj.Paper_in_File.includes(name[5])){
                    obj.Paper_Type = FileDataObj.Paper_Type[FileDataObj.Paper_in_File.indexOf(name[5])]
                } else {
                    Obj.error = true ; 
                }
            }
            console.log(name);
        return obj ;
    }
    function handleFiles(files) {
        let i = 0 ;
        FileList.innerHTML = "";

        for (const file of files) {
            i++;
            const div = document.createElement("div");
            const Data = getFileData(file);
            var FileView = 
    `<div class="w-96 h-auto bg-white my-8 rounded-md  py-3 shadow-lg shadow-indigo-500/40">
        <div class="flex items-center">
            <div class="bg-white rounded-md mx-3">
                <img src="../Images/pdf-icon.png " class=" w-16 inline-block" alt="PDF LOGO">
            </div>
            <p class=" break-words w-48"> 
                <b>Course : </b> ${Data.Course} <br> <b>Stream : </b> ${Data.Stream} <br> <b>Exam Year : </b> ${Data.year} <br> <b> Semester : </b> ${Data.Semester}  <br> <b> Exam Type : </b> ${Data.Exam_Type}  <br> <b>Paper Type : </b> ${Data.Paper_Type==undefined?"Regular":Data.Paper_Type}
            </p>

            <form id="upload-form${i}" enctype="multipart/form-data">
                <input type="file" hidden id="pdf-file${i}" name="pdf-file${i}" accept=".pdf">
                <button type="button" id="upload${i}" class="bg-indigo-600 px-6 py-2 mr-3 text-white rounded-md shadow-lg shadow-indigo-500/40" onclick="uploadFile()" >Upload</button>           
            </form>
        </div>
        <progress  value="59" max="100" id="progress${i}"> </progress>
        <div class="ml-3 mt-2 text-red-600" id="msgBox${i}">
        ${Data.error?"Error : File name not valid <img src=\"../Images/red-cross.png\" class=\"inline-block w-5 h-5 mb-1\" alt=\"Error Image\">":""}
        </div>
    </div>`;
            div.innerHTML = FileView ; 
            FileList.appendChild(div);
        }
    }

    const upload_with_porgress = ()=>{
    const form = document.getElementById('upload-form');
    const fileInput = document.getElementById('file-input');
    const progressBar = document.getElementById('progress');

    form.addEventListener('submit', e => {
    e.preventDefault();

    const file = fileInput.files[0];
    const formData = new FormData();
    formData.append('file', file);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/upload', true);
    xhr.upload.onprogress = e => {
        if (e.lengthComputable) {
        const percentComplete = (e.loaded / e.total) * 100;
        progressBar.style.width = `${percentComplete}%`;
            }
        };
        xhr.send(formData);
        });
    }