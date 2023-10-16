<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Images/college_logo.ico" type="image/x-icon">
  <title>Admin Login</title>
  <link rel="stylesheet" href="../CSS/output.css">
</head>
<body>

  <div id="otpbox" class="absolute top-[100px] left-10  mx-2 my-2 bg-white w-max px-3 py-2 border-green-600 rounded border-2 flex items-center justify-center text-green-600 "> <div class="text-lg">OTP Sent Successfully. &nbsp;</div>  <img src="../Images/green-tick.png" class="h-6 w-6"  alt="img"> 
<!-- Please Enter Correct Email ID -->
</div>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-20 w-auto" src="../Images/college_logo.png" alt="GCECT">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Question Paper Upload </h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="#" method="POST">
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Enter Admin Email address</label>
        <div class="mt-2">
          <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          <div class="text-sm text-red-600 px-3 py-1" > Please Enter Correct Email Address</div>
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="Password" class="block text-sm font-medium leading-6 text-gray-900">Enter Password</label>
        </div>
        <div class="mt-2">
          <input id="Password" name="Password" type="password" required class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          <div class="text-sm text-red-600 px-3 py-1" > Please Enter Correct Password</div>
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Log in</button>

      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-500">
      Copyright @ 2023  <br> Govt College of Engg. & Ceramic Technology  <br> All Rights Reserved 
      <!-- <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Start a 14 day free trial</a> -->
    </p>
  </div>
</div>

</body>

</html>
