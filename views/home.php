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

  <?php require_once "../views/includes/nav.php" ?>

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

      <div id="wikiContainer" class="flex flex-wrap gap-9">
        <?php foreach ($wikies as $wiki) : ?> 
          <a href="/article?id=<?= $wiki['id'] ?>" class="mb-4 mr-3 bg-gray-100 hover:bg-gray-200 flex flex-col gap-3 w-[360px] rounded-xl p-3">
            <img src="./images/wiki/<?= $wiki['src'] ?>" class="w-full h-auto rounded-xl" />
            <span class="w-fit text-[#6C40FF] inline-block py-1 px-2 rounded-full">
              <span class="bg-[#6C40FF] h-3 w-3 inline-block rounded-full"></span>
              <?= $wiki['name'] ?></span>
            <p class="raleway font-semibold text-lg text-gray-700">
              <?= $wiki['title'] ?>
            </p>
          </a>
        <?php endforeach; ?>


      </div>
    </section>


  </main>

  <hr class="my-6" />

  <?php require_once "../views/includes/footer.php" ?>


 
</body>

</html>