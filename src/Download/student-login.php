<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Images/college_logo.ico" type="image/x-icon">
  <title>Student Login</title>
  <link rel="stylesheet" href="../CSS/output.css">
</head>

<body>

<div id="otpbox" class="absolute top-[100px] left-10  mx-2 my-2 bg-white w-max px-3 py-2 border-green-600 rounded border-2 flex items-center justify-center text-green-600 "> <div class="text-lg">OTP Sent Successfully. &nbsp;</div>  <img src="../Images/green-tick.png" class="h-6 w-6"  alt="img"> </div>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-20 w-auto" src="../Images/college_logo.png" alt="GCECT">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Question Paper Download </h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="verify.php" method="POST">
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Enter Your Registered Email address</label>
        <div class="mt-2">
          <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          <div class="text-sm text-red-600 px-3 py-1" > Please Enter Correct Email Address</div>
        </div>
      </div>
      <div class="flex items-end justify-between">
        <div class="py-1">
          Resend OTP in : <span id="counter"></span>
        </div>
        <button type="button" id="OTP_Button" onclick="Call_otp()" class="ease-in duration-300 rounded px-2 py-1 hover:bg-green-600 h-auto w-auto hover:text-white text-green-700 bg-white">
          Send OTP
        </button>
      </div>
      <div>
        <div class="flex items-center justify-between">
          <label for="OTP" class="block text-sm font-medium leading-6 text-gray-900">Enter OTP</label>
        </div>
        <div class="mt-2">
          <input id="OTP" name="__otp" type="text" maxlength="6" required class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          <div class="text-sm text-red-600 px-3 py-1" > Please Enter Correct OTP</div>
        </div>
      </div>
      <div style="visibility: hidden;">
        <?php
          session_start();
          $sessionId = session_id();
          $_SESSION['Id'] = $sessionId;
          echo '<input type="text" name="__Session_id" id="__Session_id" value="'.$sessionId.'" >';
          ?>
      </div>
      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Log in</button>

      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-500">
      Copyright @ 2023  <br> Govt College of Engg. & Ceramic Technology  <br> All Rights Reserved 
    </p>
  </div>
</div>
</body>
<script>
const htmlString = `
    <main>
        <h1>Convert a String to HTML</h1>
        <p>Learn how to convert a string to HTML using JavaScript.</p>
    </main>
`;

const convertStringToHTML = htmlString => {
    const parser = new DOMParser();
    const html = parser.parseFromString(htmlString, 'text/html');

    return html.body;
}

const body = convertStringToHTML(htmlString);




  const showmsg = (msg,type)=>{
    msgBOX = document.getElementById("otpbox");
    msgBOX.innerHTML = msg ;
    switch (type) {
      case "Success":
        break;      
      case "Warning":
        break;      
      case "Error":
        break;
      default:
        break;
    setTimeout(() => {
      msgBOX.style.top = "-100px";
    }, 3000);
    }
  }
  const Call_otp = ()=>{
    const formData = new FormData();
    const xhr = new XMLHttpRequest();
    let email = document.getElementById("email").value;
    formData.append("email", email);
    console.log(email);

    let __Session_id = document.getElementById("__Session_id").value;
    formData.append("__Session_id",__Session_id);
    console.log(__Session_id);

    xhr.onload = ()=> {
        console.log(xhr.responseText);
        try {
        data = JSON.parse(xhr.responseText);
          showmsg(data.msg,data.type);
        } catch (error) {
          showmsg("Error in sending OTP. <br> Please check Email ID .","Error");
        }
    };

    xhr.open('POST', 'generate_otp.php', true);
    xhr.send(formData);
  }

  // const verify_otp = ()=>{
  //   const formData = new FormData();
  //   const xhr = new XMLHttpRequest();
  //   formData.append("email", document.getElementById("email").value);
  //   formData.append("OTP", document.getElementById("OTP").value);
  //   xhr.onload = ()=> {
  //       console.log(xhr.responseText);
  //   };
  //   xhr.open('POST', 'verify.php', true);
  //   xhr.send();
  // }

// document.getElementById("OTP_Button").addEventListener("click",Call_otp());


</script>
</html>
