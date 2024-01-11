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

<body>
  <nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="./images/logo.png" class="h-8" alt="Flowbite Logo" />
      </a>

      <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <?php if (!isset($_SESSION['user_email'])) : ?>
          <a href="/login" class="cursor-pointer focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center text-blue-700 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</a>
          <a href="/register" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</a>
        <?php else : ?>
          <button id="userMenu"  type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 rounded-full" src="./images/profile.jpg" alt="user photo">
          </button>

          <div id="userDropdown" class="z-50 hidden absolute translate-y-6 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
            <div class="px-4 py-3">
              <span class="block text-sm text-gray-900 dark:text-white">Soulaiman Bouhlal</span>
              <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">admin@gmail.com</span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
              <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
              </li>
              <li>
                <a href="/api/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
              </li>
            </ul>
          </div>

        <?php endif; ?>

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
    </div>

    <section class="w-full  grid grid-cols-12 grid-rows-5  gap-x-3 gap-y-0">
      <div class="col-span-7 row-span-5 relative overflow-hidden rounded-lg bg-blue-600">
        <img class="w-full h-full object-cover" src="./images/app-store-ios-2022-b.webp" />
      </div>

      <div class="rounded-lgp-4 col-span-5 row-span-5">
        <div class="">
          <span class="bg-[#F1ECFF] text-[#6C40FF] inline-block mb-4 py-1 px-2 rounded-full">
            <span class="bg-[#6C40FF] h-3 w-3 inline-block rounded-full"></span>
            Artificial Intelligence</span>

          <h1 class="font-bold mb-4 text-2xl text-gray-800">
            Mastering ChatGPT Blog Creation: Dos and Don'ts for SaaS Marketing
            Managers
          </h1>
          <p class="font-normal text-xl text-gray-600">
            Hello there! As a marketing manager in the SaaS industry, you
            might be looking for innovative ways to engage your audience. I
            bet generative AI has crossed your mind as an option for creating
            content. Well, let me share from my firsthand experience.
          </p>
        </div>
      </div>
    </section>


    <section>
      <h2 class="text-3xl mt-7 mb-14 font-semibold">Latest Posts</h2>

      <div class="flex flex-wrap gap-9">
        <a href="/" class="mb-4 mr-3 bg-gray-100 hover:bg-gray-200 flex flex-col gap-3 w-[360px] rounded-xl p-3">
          <img src="./images/ghana.jpg" class="w-full h-auto rounded-xl" />
          <span class="w-fit text-[#6C40FF] inline-block py-1 px-2 rounded-full">
            <span class="bg-[#6C40FF] h-3 w-3 inline-block rounded-full"></span>
            Markets</span>
          <h1 class="raleway font-semibold text-lg text-gray-700">
            Ghana’s Inflation Slows Again, Fanning Hopes For A Rate Cut
          </h1>
        </a>

        <a href="/" class="mb-4 mr-3 bg-gray-100 hover:bg-gray-200 flex flex-col gap-3 w-[360px] rounded-xl p-3">
          <img src="./images/960x640.jpg" class="w-full h-auto rounded-xl" />
          <span class="w-fit text-[#6C40FF] inline-block py-1 px-2 rounded-full">
            <span class="bg-[#6C40FF] h-3 w-3 inline-block rounded-full"></span>
            Politics</span>
          <h1 class="raleway font-semibold text-lg text-gray-700">
            Can Biden Convince Americans His Brand of Populism Is Better Than
            Trump’s?
          </h1>
        </a>

        <a href="/" class="mb-4 mr-3 bg-gray-100 hover:bg-gray-200 flex flex-col gap-3 w-[360px] rounded-xl p-3">
          <img src="./images/tesla.jpg" class="w-full h-auto rounded-xl" />
          <span class="w-fit text-[#6C40FF] inline-block py-1 px-2 rounded-full">
            <span class="bg-[#6C40FF] h-3 w-3 inline-block rounded-full"></span>
            Technology</span>
          <h1 class="raleway font-semibold text-lg text-gray-700">
            Tesla Makes Upgraded Model 3 Sedan Available in North America
          </h1>
        </a>

        <a href="/" class="mb-4 mr-3 bg-gray-100 hover:bg-gray-200 flex flex-col gap-3 w-[360px] rounded-xl p-3">
          <img src="./images/twitter-x-musk-graffiti.webp" class="w-full h-auto rounded-xl" />
          <span class="w-fit text-[#6C40FF] inline-block py-1 px-2 rounded-full">
            <span class="bg-[#6C40FF] h-3 w-3 inline-block rounded-full"></span>
            Apps</span>
          <h1 class="raleway font-semibold text-lg text-gray-700">
            X removes support for NFT profile pictures
          </h1>
        </a>

        <a href="/" class="mb-4 mr-3 bg-gray-100 hover:bg-gray-200 flex flex-col gap-3 w-[360px] rounded-xl p-3">
          <img src="./images/Green-energy-what-is-it-all-about-greenenergy-image-1.jpg" class="w-full h-auto rounded-xl" />
          <span class="w-fit text-[#6C40FF] inline-block py-1 px-2 rounded-full">
            <span class="bg-[#6C40FF] h-3 w-3 inline-block rounded-full"></span>
            Green</span>
          <h1 class="raleway font-semibold text-lg text-gray-700">
            What is Green Energy?
          </h1>
        </a>

        <a href="/" class="mb-4 mr-3 bg-gray-100 hover:bg-gray-200 flex flex-col gap-3 w-[360px] rounded-xl p-3">
          <img src="./images/240110073600-koh-samui-thailand-restricted.webp" class="w-full h-auto rounded-xl" />
          <span class="w-fit text-[#6C40FF] inline-block py-1 px-2 rounded-full">
            <span class="bg-[#6C40FF] h-3 w-3 inline-block rounded-full"></span>
            Travel</span>
          <h1 class="raleway font-semibold text-lg text-gray-700">
            The White Lotus’ season 3 filming location revealed
          </h1>
        </a>

        <a href="/" class="mb-4 mr-3 bg-gray-100 hover:bg-gray-200 flex flex-col gap-3 w-[360px] rounded-xl p-3">
          <img src="./images/960x640.jpg" class="w-full h-auto rounded-xl" />
          <span class="w-fit text-[#6C40FF] inline-block py-1 px-2 rounded-full">
            <span class="bg-[#6C40FF] h-3 w-3 inline-block rounded-full"></span>
            Politics</span>
          <h1 class="raleway font-semibold text-lg text-gray-700">
            Can Biden Convince Americans His Brand of Populism Is Better Than
            Trump’s?
          </h1>
        </a>

        <a href="/" class="mb-4 mr-3 bg-gray-100 hover:bg-gray-200 flex flex-col gap-3 w-[360px] rounded-xl p-3">
          <img src="./images/tesla.jpg" class="w-full h-auto rounded-xl" />
          <span class="w-fit text-[#6C40FF] inline-block py-1 px-2 rounded-full">
            <span class="bg-[#6C40FF] h-3 w-3 inline-block rounded-full"></span>
            Technology</span>
          <h1 class="raleway font-semibold text-lg text-gray-700">
            Tesla Makes Upgraded Model 3 Sedan Available in North America
          </h1>
        </a>

        <a href="/" class="mb-4 mr-3 bg-gray-100 hover:bg-gray-200 flex flex-col gap-3 w-[360px] rounded-xl p-3">
          <img src="./images/ghana.jpg" class="w-full h-auto rounded-xl" />
          <span class="w-fit text-[#6C40FF] inline-block py-1 px-2 rounded-full">
            <span class="bg-[#6C40FF] h-3 w-3 inline-block rounded-full"></span>
            Markets</span>
          <h1 class="raleway font-semibold text-lg text-gray-700">
            Ghana’s Inflation Slows Again, Fanning Hopes For A Rate Cut
          </h1>
        </a>

      </div>
    </section>


  </main>

  <hr class="my-6" />

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

  <script>

    let userMenu = document.getElementById("userMenu");
    let userDropdown = document.getElementById("userDropdown");

    userMenu.addEventListener("click", (e) => {
      userDropdown.classList.toggle("hidden")
    })

  </script>
</body>

</html>