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
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="./images/logo.png" class="h-8" alt="Flowbite Logo" />
                </a>

                <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <a href="/login" class="cursor-pointer focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center text-blue-700 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</a>
                    <a href="/register" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</a>

                    <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-cta" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>

                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="/" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="/blog" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

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
                    <img class="w-full h-full object-cover" src="./images/app-store-ios-2022-b.webp" />

                    <div class="blurred-background z-[1] p-4 absolute bottom-0">
                        <span class="bg-[#F1ECFF] text-[#6C40FF] inline-block mb-4 py-1 px-2 rounded-full">
                            <span class="bg-[#6C40FF] h-3 w-3 inline-block rounded-full"></span>
                            Artificial Intelligence</span>
                        <h1 class="font-bold text-3xl text-white">
                            Mastering ChatGPT Blog Creation: Dos and Don'ts for SaaS
                            Marketing Managers
                        </h1>
                    </div>
                </div>

                <div class="div2 bg-blue-800 rounded-lg pl-7 px-3">
                    <img class="h-[95px] w-[95px] rounded-lg mt-5 mb-5" src="./images/profile.jpg" />
                    <p class="raleway text-white font-semibold text-xl mb-3">
                        Soulaiman Bouhlal
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
                    <h2 class="raleway text-3xl mb-4 font-bold">
                        Exploring Generative AI in Content Creation
                    </h2>
                    <p class="mb-4">
                        Hello there! As a marketing manager in the SaaS industry, you
                        might be looking for innovative ways to engage your audience. I
                        bet generative AI has crossed your mind as an option for
                        creating content. Well, let me share from my firsthand
                        experience.
                    </p>

                    <p class="mb-4">
                        Google encourages high-quality blogs regardless of whether
                        they're written by humans or created using artificial
                        intelligence like ChatGPT. Here's what matters: producing
                        original material with expertise and trustworthiness based on
                        Google E-E-A-T principles.
                    </p>

                    <p class="mb-4">
                        This means focusing more on people-first writing rather than
                        primarily employing AI tools to manipulate search rankings.
                        There comes a time when many experienced professionals want to
                        communicate their insights but get stuck due to limited writing
                        skills – that’s where Generative AI can step in.
                    </p>

                    <p class="mb-4">
                        So, together, we’re going explore how this technology could help
                        us deliver valuable content without sounding robotic or
                        defaulting into mere regurgitations of existing materials
                        (spoiler alert – common pitfalls!). Hang tight - it’ll be a fun
                        learning journey!
                    </p>

                    <p class="mb-4">
                        Hello there! As a marketing manager in the SaaS industry, you
                        might be looking for innovative ways to engage your audience. I
                        bet generative AI has crossed your mind as an option for
                        creating content. Well, let me share from my firsthand
                        experience.
                    </p>

                    <p class="mb-4">
                        Google encourages high-quality blogs regardless of whether
                        they're written by humans or created using artificial
                        intelligence like ChatGPT. Here's what matters: producing
                        original material with expertise and trustworthiness based on
                        Google E-E-A-T principles.
                    </p>

                    <p class="mb-4">
                        This means focusing more on people-first writing rather than
                        primarily employing AI tools to manipulate search rankings.
                        There comes a time when many experienced professionals want to
                        communicate their insights but get stuck due to limited writing
                        skills – that’s where Generative AI can step in.
                    </p>

                    <p class="mb-4">
                        So, together, we’re going explore how this technology could help
                        us deliver valuable content without sounding robotic or
                        defaulting into mere regurgitations of existing materials
                        (spoiler alert – common pitfalls!). Hang tight - it’ll be a fun
                        learning journey!
                    </p>

                    <p class="mb-4">
                        Hello there! As a marketing manager in the SaaS industry, you
                        might be looking for innovative ways to engage your audience. I
                        bet generative AI has crossed your mind as an option for
                        creating content. Well, let me share from my firsthand
                        experience.
                    </p>

                    <p class="mb-4">
                        Google encourages high-quality blogs regardless of whether
                        they're written by humans or created using artificial
                        intelligence like ChatGPT. Here's what matters: producing
                        original material with expertise and trustworthiness based on
                        Google E-E-A-T principles.
                    </p>

                    <p class="mb-4">
                        This means focusing more on people-first writing rather than
                        primarily employing AI tools to manipulate search rankings.
                        There comes a time when many experienced professionals want to
                        communicate their insights but get stuck due to limited writing
                        skills – that’s where Generative AI can step in.
                    </p>

                    <p class="mb-4">
                        So, together, we’re going explore how this technology could help
                        us deliver valuable content without sounding robotic or
                        defaulting into mere regurgitations of existing materials
                        (spoiler alert – common pitfalls!). Hang tight - it’ll be a fun
                        learning journey!
                    </p>
                </div>

                <div class="col-span-3 row-span-5">
                    <p class="raleway text-xl mb-4 font-bold">Tags</p>
                    <ul class="flex gap-3 flex-wrap">
                        <li class="mb-2">
                            <a href="/" class="bg-[#eae8fe] font-semibold text-[#3D22CF] hover:underline rounded-2xl px-3 py-1">HTML</a>
                        </li>
                        <li class="mb-2">
                            <a href="/" class="bg-[#eae8fe] font-semibold text-[#3D22CF] hover:underline rounded-2xl px-3 py-1">web development</a>
                        </li>
                        <li class="mb-2">
                            <a href="/" class="bg-[#eae8fe] font-semibold text-[#3D22CF] hover:underline rounded-2xl px-3 py-1">css</a>
                        </li>
                        <li class="mb-2">
                            <a href="/" class="bg-[#eae8fe] font-semibold text-[#3D22CF] hover:underline rounded-2xl px-3 py-1">Javascript</a>
                        </li>
                        <li class="mb-2">
                            <a href="/" class="bg-[#eae8fe] font-semibold text-[#3D22CF] hover:underline rounded-2xl px-3 py-1">Artificial Intelligence
                            </a>
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

        <footer class="bg-white dark:bg-gray-900">
            <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
                <div class="md:flex md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <a href="https://flowbite.com/" class="flex items-center">
                            <img src="./images/logo.png" class="h-8 me-3" alt="FlowBite Logo" />
                            <span class="sr-only self-center text-2xl font-semibold whitespace-nowrap dark:text-white">wiki</span>
                        </a>
                    </div>
                    <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                                Main
                            </h2>
                            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                <li class="mb-4">
                                    <a href="/" class="hover:underline">Blog</a>
                                </li>
                                <li>
                                    <a href="/" class="hover:underline">Home</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                                Follow us
                            </h2>
                            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                <li class="mb-4">
                                    <a href="/" class="hover:underline">X</a>
                                </li>
                                <li>
                                    <a href="/" class="hover:underline">Facebook</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                                Legal
                            </h2>
                            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <div class="sm:flex sm:items-center sm:justify-between">
                    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="/" class="hover:underline">Wiki</a>. All Rights
                        Reserved.
                    </span>
                    <div class="flex mt-4 sm:justify-center sm:mt-0">
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                                <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Facebook page</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                                <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                            </svg>
                            <span class="sr-only">Discord community</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                                <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Twitter page</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">GitHub account</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Dribbble account</span>
                        </a>
                    </div>
                </div>
            </div>
        </footer>

        <script src="./js/validation.js"></script>
    </body>

    </html>
    <!-- partial -->
</body>

</html>