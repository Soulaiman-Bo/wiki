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


    <main>
        <section class=" flex items-center justify-center bg-indigo-300 h-96 p-8">

            <form class="w-[60%]">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>

                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>

                    <input type="search" id="searchInput" class="block  w-full h-20 p-4 ps-10 text-xl font-medium text-gray-700 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required />

                    <button type="submit" class="text-white absolute end-6 bottom-[1.3rem] h-10  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Search
                    </button>
                </div>


            </form>

        </section>

        <div class="min-h-screen max-w-screen-xl mx-auto bg-gray-50 space-y-4 py-12 px-4 sm:px-6">
            <div class="w-full p-5 rounded-lg bg-white">

                <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">
                    <select id="tagselect" onchange="tagselect()" class=" px-4 py-3 w-full rounded-md border border-gray-400 bg-gray-50 focus:border-gray-600 focus:bg-white focus:ring-0 text-sm">
                        <option value="" selected disabled>Tags</option>

                        <?php foreach ($tags as $tag) : ?>
                            <option value="/searchbytag?tag=<?= $tag['id'] ?>">
                                <?= $tag['name'] ?>
                            </option>
                        <?php endforeach; ?>

                    </select>

                    <select id="catselect" onchange="catselect()" class=" px-4 py-3 w-full rounded-md border border-gray-400 bg-gray-50 focus:border-gray-600 focus:bg-white focus:ring-0 text-sm">
                        <option value="" selected disabled>Catgories</option>

                        <?php foreach ($categories as $category) : ?>
                            <option value="/searchbycat?id=<?= $category['id'] ?>">
                                <?= $category['name'] ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>

            </div>

            <section>


                <h2 class="text-3xl mt-7 mb-14 font-semibold">Latest Posts</h2>

                <div id="wikiContainer" class="flex flex-wrap gap-9">
                    <?php foreach ($wikies as $wiki) : ?>

                        <a href="/article?id=<?= $wiki['id'] ?>" class="mb-4 mr-3 bg-gray-100 hover:bg-gray-200 flex flex-col gap-3 w-[360px] rounded-xl p-3">
                            <img src="./images/ghana.jpg" class="w-full h-auto rounded-xl" />
                            <span class="w-fit text-[#6C40FF] inline-block py-1 px-2 rounded-full">
                                <span class="bg-[#6C40FF] h-3 w-3 inline-block rounded-full"></span>
                                Markets</span>
                            <h1 class="raleway font-semibold text-lg text-gray-700">
                                <?= $wiki['title'] ?>
                            </h1>
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </main>

    <?php require_once "../views/includes/footer.php" ?>


    <script>
        function catselect() {
            var selectedValue = document.getElementById("catselect").value;
            if (selectedValue) {
                window.location.href = selectedValue;
            }
        }

        function tagselect() {
            var selectedValue = document.getElementById("tagselect").value;
            if (selectedValue) {
                window.location.href = selectedValue;
            }
        }
    </script>
    <script>
        let searchInput = document.getElementById("searchInput");
        let wikiContainer = document.getElementById("wikiContainer");

        function debounce(func, delay) {
            let timeoutId;
            return function() {
                const context = this;
                const args = arguments;

                clearTimeout(timeoutId);

                timeoutId = setTimeout(() => {
                    func.apply(context, args);
                }, delay);
            };
        }



        const debouncedInputHandler = debounce((value) => {

            fetch(`/api/search/wiki?query=${value}`)
                .then(response => {

                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }

                    return response.json();

                })
                .then(data => {
                    console.log(data);

                    let wikiies = "";

                    data.forEach((elm) => {

                        matchdiv = `<a href="/" class="mb-4 mr-3 bg-gray-100 hover:bg-gray-200 flex flex-col gap-3 w-[360px] rounded-xl p-3">
                                        <img src="./images/wiki/${elm.src}" class="w-full h-auto rounded-xl" />
                                        <span class="w-fit text-[#6C40FF] inline-block py-1 px-2 rounded-full">
                                        <span class="bg-[#6C40FF] h-3 w-3 inline-block rounded-full"></span>
                                        ${elm.name}</span>
                                        <p class="raleway font-semibold text-lg text-gray-700">
                                        ${elm.title}
                                        </p>
                                    </a>`;
                        wikiies += matchdiv;

                    });

                    wikiContainer.innerHTML = wikiies;
                })
                .catch(error => {
                    console.log(error);
                });
        }, 400);


        //debouncedInputHandler("");

        searchInput.addEventListener('input', (e) => {
            console.log("kuygoh");
            debouncedInputHandler(e.target.value);
        })
    </script>
</body>

</html>