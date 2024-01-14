<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>CodePen - Sign-in Form with Tailwind CSS</title>
</head>

<body>
    <!-- partial:index.partial.html -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login with Tailwind</title>
        <link rel="stylesheet" href="./dist/output.css" />
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    </head>

    <body class="bg-gray-50">
        
        <?php require_once "../views/includes/nav.php" ?>


        <main class="min-h-screen max-w-screen-xl mx-auto bg-gray-50 space-y-4 py-12 px-4 sm:px-6">
            <div class="flex gap-3 bg-[#efeeee] px-4 py-1 rounded-md w-fit">
                <a href="/" class="hover:underline flex justify-center gap-3 items-center">
                    <p class="text-[#5c666d]">Home</p>
                    <svg width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.542 5.35099L0 9.85099V8.50099L5.76 4.99099L0 1.46299V0.148987L7.542 4.68499V5.35099Z" fill="#6C7880" />
                    </svg>
                </a>

                <a href="/" class="hover:underline flex justify-center gap-3 items-center">
                    <p class="text-[#5c666d]">Blog</p>
                    <svg width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.542 5.35099L0 9.85099V8.50099L5.76 4.99099L0 1.46299V0.148987L7.542 4.68499V5.35099Z" fill="#6C7880" />
                    </svg>
                </a>

                <a href="/" class="hover:underline flex justify-center gap-3 items-center">
                    <p class="text-[#5c666d]">Ai</p>
                    <svg width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.542 5.35099L0 9.85099V8.50099L5.76 4.99099L0 1.46299V0.148987L7.542 4.68499V5.35099Z" fill="#6C7880" />
                    </svg>
                </a>

            </div>

            <section class="w-full parent">
                <div class="div1 relative overflow-hidden rounded-lg bg-blue-600">
                    <img class="w-full h-full object-cover" src="./images/wiki/<?= $wiki['src'] ?> " />

                    <div class="blurred-background z-[1] p-4 absolute bottom-0">
                        <span class="bg-[#F1ECFF] text-[#6C40FF] inline-block mb-4 py-1 px-2 rounded-full">
                            <span class="bg-[#6C40FF] h-3 w-3 inline-block rounded-full"></span>
                            <?= $wiki['name'] ?></span>
                        <h1 class="font-bold text-3xl text-white">
                            <?= $wiki['title'] ?>
                        </h1>
                    </div>
                </div>

                <div class="div2 bg-blue-800 rounded-lg pl-7 px-3">
                    <img class="h-[95px] w-[95px] rounded-lg mt-5 mb-5" src="./images/profile.jpg" />
                    <p class="raleway text-white font-semibold text-xl mb-3">
                        <?= $wiki['firstname'] ?> <?= $wiki['lastname'] ?>
                    </p>

                    <p class="raleway text-white font-light text-base">
                        Software Engineer At Google
                    </p>

                    <hr class="my-3" />

                    <p class="raleway text-white font-light text-base">
                        With 11 years in SaaS, I've built MillionVerifier and SAAS
                        First. Passionate about SaaS, data, and AI. Let's connect if you
                        share the same drive for success!
                    </p>
                </div>

                <div class="div3 rounded-lg bg-blue-900 p-4">
                    <p class="raleway text-white text-base font-medium mb-2">
                        Share with your community!
                    </p>
                    <div class="flex gap-3">
                        <a href="/">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_73_1346)">
                                    <path d="M16.0031 14.4878L22.7542 24.1442H19.9835L14.4745 16.2645V16.264L13.6657 15.1073L7.23022 5.90195H10.0009L15.1943 13.331L16.0031 14.4878Z" fill="white" />
                                    <path d="M26.7584 0H3.24156C1.45134 0 0 1.45134 0 3.24156V26.7584C0 28.5487 1.45134 30 3.24156 30H26.7584C28.5487 30 30 28.5487 30 26.7584V3.24156C30 1.45134 28.5487 0 26.7584 0ZM19.135 25.4406L13.5601 17.3271L6.58044 25.4406H4.77653L12.7592 16.1619L4.77653 4.54401H10.865L16.144 12.2269L22.7533 4.54401H24.5572L16.9452 13.3924H16.9447L25.2235 25.4406H19.135Z" fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_73_1346">
                                        <rect width="30" height="30" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                        <a href="/">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M25.9091 0H4.09091C1.83156 0 0 1.83156 0 4.09091V25.9091C0 28.1684 1.83156 30 4.09091 30H25.9091C28.1684 30 30 28.1684 30 25.9091V4.09091C30 1.83156 28.1684 0 25.9091 0Z" fill="white" />
                                <path d="M10.8068 8.18182C10.8068 8.68751 10.6568 9.18184 10.3759 9.60231C10.0949 10.0228 9.69558 10.3505 9.22839 10.544C8.76119 10.7375 8.2471 10.7882 7.75112 10.6895C7.25515 10.5909 6.79957 10.3473 6.44199 9.98976C6.08441 9.63218 5.8409 9.1766 5.74225 8.68063C5.64359 8.18465 5.69422 7.67056 5.88774 7.20337C6.08126 6.73617 6.40898 6.33685 6.82944 6.0559C7.24991 5.77495 7.74424 5.625 8.24993 5.625C8.92805 5.625 9.57838 5.89438 10.0579 6.37387C10.5374 6.85337 10.8068 7.50371 10.8068 8.18182Z" fill="#152999" />
                                <path d="M10.2272 12.4432V23.7392C10.2277 23.8225 10.2117 23.9051 10.1801 23.9823C10.1485 24.0594 10.102 24.1295 10.0432 24.1886C9.98446 24.2477 9.91459 24.2946 9.83764 24.3265C9.76069 24.3585 9.67818 24.375 9.59485 24.375H6.89996C6.81663 24.3752 6.73407 24.359 6.65704 24.3272C6.58001 24.2954 6.51002 24.2487 6.45109 24.1898C6.39217 24.1309 6.34547 24.0609 6.31368 23.9838C6.28189 23.9068 6.26565 23.8242 6.26587 23.7409V12.4432C6.26587 12.275 6.33268 12.1137 6.45159 11.9948C6.57051 11.8759 6.73179 11.8091 6.89996 11.8091H9.59485C9.76273 11.8095 9.92357 11.8766 10.0421 11.9954C10.1607 12.1143 10.2272 12.2753 10.2272 12.4432Z" fill="#152999" />
                                <path d="M24.3137 18.3239V23.7921C24.3139 23.8687 24.299 23.9446 24.2698 24.0154C24.2405 24.0862 24.1976 24.1506 24.1434 24.2048C24.0893 24.2589 24.0249 24.3019 23.9541 24.3311C23.8832 24.3603 23.8073 24.3752 23.7307 24.375H20.833C20.7564 24.3752 20.6805 24.3603 20.6096 24.3311C20.5388 24.3019 20.4745 24.2589 20.4203 24.2048C20.3661 24.1506 20.3232 24.0862 20.2939 24.0154C20.2647 23.9446 20.2498 23.8687 20.25 23.7921V18.4926C20.25 17.7017 20.4819 15.029 18.1824 15.029C16.4012 15.029 16.0381 16.858 15.9665 17.6796V23.7921C15.9665 23.9452 15.9063 24.0922 15.7988 24.2013C15.6913 24.3104 15.5452 24.3728 15.3921 24.375H12.5932C12.5167 24.375 12.441 24.3599 12.3704 24.3306C12.2998 24.3013 12.2356 24.2583 12.1816 24.2042C12.1276 24.15 12.0848 24.0857 12.0557 24.015C12.0266 23.9443 12.0117 23.8685 12.012 23.7921V12.3938C12.0117 12.3173 12.0266 12.2415 12.0557 12.1708C12.0848 12.1001 12.1276 12.0358 12.1816 11.9816C12.2356 11.9275 12.2998 11.8845 12.3704 11.8552C12.441 11.8259 12.5167 11.8108 12.5932 11.8108H15.3921C15.5467 11.8108 15.695 11.8722 15.8043 11.9815C15.9136 12.0909 15.975 12.2391 15.975 12.3938V13.379C16.6364 12.3869 17.6165 11.6216 19.708 11.6216C24.3409 11.6216 24.3137 15.9477 24.3137 18.3239Z" fill="#152999" />
                            </svg>
                        </a>
                        <a href="/">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_73_1344)">
                                    <path d="M25.6055 0H4.39453C1.97159 0 0 1.97159 0 4.39453V25.6055C0 28.0284 1.97159 30 4.39453 30H13.2422V19.3945H9.72656V14.1211H13.2422V10.5469C13.2422 7.63893 15.6077 5.27344 18.5156 5.27344H23.8477V10.5469H18.5156V14.1211H23.8477L22.9688 19.3945H18.5156V30H25.6055C28.0284 30 30 28.0284 30 25.6055V4.39453C30 1.97159 28.0284 0 25.6055 0Z" fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_73_1344">
                                        <rect width="30" height="30" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                </div>
            </section>

            <section class="grid grid-cols-9 grid-rows-5 gap-x-5 gap-y-0">
                <div class="pr-4 col-span-6 row-span-5">
                    <?= $wiki['content'] ?>
                </div>

                <div class="col-span-3 row-span-5">
                    <p class="raleway text-xl mb-4 font-bold">Tags</p>
                    <ul class="flex gap-3 flex-wrap">
                        <li class="mb-2">
                            <?php foreach ($tags as $tag) : ?>
                                <a href="/searchbytag?tag=<?= $tag['id'] ?>" class="bg-[#eae8fe] font-semibold text-[#3D22CF] hover:underline rounded-2xl px-3 py-1"><?= $tag['name'] ?></a>
                            <?php endforeach; ?>
                        </li>
                    </ul>
                </div>
            </section>

            <hr class="w-full my-4" />
            <section>
                <h3 class="text-3xl mb-4 font-semibold">Related Posts</h3>

                <div class="flex flex-wrap gap-9">
                    <a href="/" class="mb-4 ml-3 bg-gray-100 hover:bg-gray-200 flex flex-col gap-3 w-[360px] rounded-xl p-3">
                        <img src="./images/app-store-ios-2022-b.webp" class="w-full h-auto rounded-xl" />
                        <span class="w-fit text-[#6C40FF] inline-block py-1 px-2 rounded-full">
                            <span class="bg-[#6C40FF] h-3 w-3 inline-block rounded-full"></span>
                            Artificial Intelligence</span>
                        <h1 class="raleway font-semibold text-lg text-gray-700">
                            Mastering ChatGPT Blog Creation: Dos and Don'ts for SaaS
                            Marketing Managers
                        </h1>
                    </a>

                    <a href="/" class="mb-4 ml-3 bg-gray-100 hover:bg-gray-200 flex flex-col gap-3 w-[360px] rounded-xl p-3">
                        <img src="./images/app-store-ios-2022-b.webp" class="w-full h-auto rounded-xl" />
                        <span class="w-fit text-[#6C40FF] inline-block py-1 px-2 rounded-full">
                            <span class="bg-[#6C40FF] h-3 w-3 inline-block rounded-full"></span>
                            Artificial Intelligence</span>
                        <h1 class="raleway font-semibold text-lg text-gray-700">
                            Mastering ChatGPT Blog Creation: Dos and Don'ts for SaaS
                            Marketing Managers
                        </h1>
                    </a>

                    <a href="/" class="mb-4 ml-3 bg-gray-100 hover:bg-gray-200 flex flex-col gap-3 w-[360px] rounded-xl p-3">
                        <img src="./images/app-store-ios-2022-b.webp" class="w-full h-auto rounded-xl" />
                        <span class="w-fit text-[#6C40FF] inline-block py-1 px-2 rounded-full">
                            <span class="bg-[#6C40FF] h-3 w-3 inline-block rounded-full"></span>
                            Artificial Intelligence</span>
                        <h1 class="raleway font-semibold text-lg text-gray-700">
                            Mastering ChatGPT Blog Creation: Dos and Don'ts for SaaS
                            Marketing Managers
                        </h1>
                    </a>
                </div>

            </section>
        </main>

        <?php require_once "../views/includes/footer.php" ?>


        <script src="./js/validation.js"></script>
    </body>

    </html>
    <!-- partial -->
</body>

</html>