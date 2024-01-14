<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login with Tailwind</title>
    <link rel="stylesheet" href="./dist/output.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>

<body class="bg-gray-50">

    <?php require_once "../views/includes/nav.php" ?>



    <main class="min-h-screen flex flex-col items-center justify-center bg-gray-50 space-y-10 py-12 px-4 sm:px-6 lg:px-8">

        <form id="loginForm" method="post" action="/api/user/login" class="max-w-md w-full mx-auto border border-gray-200 bg-white shadow-xl rounded-lg p-7 space-y-6">

            <div class="flex flex-col">
                <label class="text-sm font-bold text-gray-600 mb-1" for="email">Email Address</label>
                <input class="border rounded-md bg-white px-3 py-2" type="text" name="email" id="email" placeholder="Enter your Email Address" />
                <span id="emailError" class="ml-2 text-red-500"></span>
            </div>

            <div class="flex flex-col">
                <label class="text-sm font-bold text-gray-600 mb-1" for="password">Password</label>
                <input class="border rounded-md bg-white px-3 py-2" type="password" name="password" id="password" placeholder="Enter your Password" />
                <span id="passwordError" class="ml-2 text-red-500"></span>
            </div>

            <div>
                <button type="submit" class="w-full bg-indigo-600 text-white rounded-md p-2">Sign in</button>
            </div>

        </form>
        </div>
    </main>

    <script src="./js/formValidation.js"></script>
    <script src="./js/loginValidation.js"></script>

</body>

</html>