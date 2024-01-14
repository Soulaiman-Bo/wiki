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

        <form id="signupForm" method="post" action="/api/user/register" class="max-w-fit w-full mx-auto border border-gray-200 bg-white shadow-xl rounded-lg p-7 space-y-6">
            <div class="flex gap-3">
                <div class="flex flex-col">
                    <label class="text-sm font-bold text-gray-600 mb-1" for="firstname">Firstname</label>
                    <input class="border rounded-md bg-white px-3 py-2" type="text" name="firstname" id="firstname" placeholder="Enter your Firstname" />
                    <span id="firstnameError" class="ml-2 text-red-500"></span>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm font-bold text-gray-600 mb-1" for="lastname">Lastname</label>
                    <input class="border rounded-md bg-white px-3 py-2" type="text" name="lastname" id="lastname" placeholder="Enter your Lastname" />
                    <span id="lastnameError" class="ml-2 text-red-500"></span>
                </div>
            </div>

            <div class="flex flex-col">
                <label class="text-sm font-bold text-gray-600 mb-1" for="email">Email</label>
                <input class="border rounded-md bg-white px-3 py-2" type="email" name="email" id="email" placeholder="Enter your email" />
                <span id="emailError" class="ml-2 text-red-500"></span>
            </div>
            <div class="flex gap-3">
                <div class="flex flex-col">
                    <label class="text-sm font-bold text-gray-600 mb-1" for="password">Password</label>
                    <input class="border rounded-md bg-white px-3 py-2" type="password" name="password" id="password" placeholder="Enter your Password" />
                    <span id="passwordError" class="ml-2 text-red-500"></span>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm font-bold text-gray-600 mb-1" for="confirmpassword">Confirm Password</label>
                    <input class="border rounded-md bg-white px-3 py-2" type="password" name="confirmpassword" id="confirmpassword" placeholder="Enter your Confirm Password" />
                    <span id="confirmpasswordError" class="ml-2 text-red-500"></span>
                </div>
            </div>

            <div class="flex flex-col">
                <label class="text-sm font-bold text-gray-600 mb-1" for="title">Title</label>
                <input class="border rounded-md bg-white px-3 py-2" type="text" name="title" id="title" placeholder="Enter your title" />
                <span id="titleError" class="ml-2 text-red-500"></span>
            </div>
            <div class="flex flex-col">
                <label class="text-sm font-bold text-gray-600 mb-1" for="description">Description</label>
                <textarea class="border rounded-md bg-white px-3 py-2" type="text" name="description" id="description" placeholder="Enter your description"></textarea>
                <span id="descriptionError" class="ml-2 text-red-500"></span>
            </div>
            <div class="flex flex-col">
                <label class="text-sm font-bold text-gray-600 mb-1" for="profile_img">Profile Image</label>
                <input class="border rounded-md bg-white px-3 py-2" type="file" name="profile_img" id="profile_img" placeholder="Enter your Profile Image" />
                <span id="profile_imgError" class="ml-2 text-red-500"></span>
            </div>
            <div class="flex flex-col gap-2">
                <button id="signup_btn" class="color w-full  text-white rounded-md p-2">Sign up</button>
                <div id="login_btn" class="hidden">
                    <a href="/login" class=" w-full flex justify-center items-center bg-blue-500 text-white rounded-md p-2">Log In</a>
                </div>
            </div>
        </form>
        </div>
    </main>

    <script src="./js/formValidation.js"></script>
    <script src="./js/signupValidation.js"></script>

</body>

</html>