<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../dist/output.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title> Wikies</title>
</head>

<body class="">

    <?php require_once "../views/includes/dashboard_nav.php" ?>

    <?php if ($_SESSION['user_role'] === 1) : ?>
        <?php require_once "../views/includes/admin_sidebar.php" ?>
    <?php else : ?>
        <?php require_once "../views/includes/author_sidebar.php" ?>
    <?php endif; ?>

    <div class=" p-4 sm:ml-64">
        <div class="p-4 border-2 min-h-[100vh] bg-gray-200 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="flex flex-col my-6 mx-4 rounded-2xl shadow-xl shadow-gray-200">
                <div class="overflow-x-auto rounded-2xl">
                    <div class="inline-block min-w-full align-middle">

                        <form id="addCategoryForm" method="post" action="/api/category/create" class="items-center gap-5 p-9 mb-9 shadow-lg dark:bg-slate-850 dark:shadow-dark-xl relative rounded-2xl bg-white bg-clip-border">
                            <label for="title" class="block mb-2 ml-1 font-bold text-xl text-slate-700 dark:text-white/80">Add Category
                            </label>

                            <div class="flex gap-6  items-center">
                                <input type="text" name="categoryname" class=" flex-1 focus:shadow-primary-outline h-16 dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                <button type="submit" data-modal-toggle="delete-user-modal" class="inline-flex items-center  w-fit py-3 px-4 text-sm font-medium text-center text-white bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255)">
                                        <path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"></path>
                                    </svg>
                                    Create New Category
                                </button>
                            </div>
                        </form>

                        <div class="overflow-hidden shadow-lg">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed">
                                <thead class="bg-white">
                                    <tr>
                                        <th scope="col" class=" w-1/3 p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            ID
                                        </th>

                                        <th scope="col" class=" w-1/3 p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            Name
                                        </th>

                                        <th scope="col" class=" w-1/3 p-4 lg:p-5"></th>

                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php foreach ($categories as $category) : ?>
                                        <tr class="hover:bg-gray-100">
                                            <td class=" w-1/3 p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                                                <?= $category['id'] ?>
                                            </td>

                                            <td class=" w-1/3 p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                                                <?= $category['name'] ?>
                                            </td>

                                            <td class="w-1/3 flex gap-2 p-4 space-x-2 whitespace-nowrap lg:p-5">
                                                <form method="delete" class="deleteCategoryForm" action="/api/category/deletcategory?id=<?= $category['id'] ?>">
                                                    <button type="submit" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-br from-red-400 to-red-600 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                                                        <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        Delete Category
                                                    </button>
                                                </form>

                                                <button class="btn inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 hover:text-gray-900 hover:scale-[1.02] transition-all" onclick="updatecategory(<?= $category['id'] ?>)">
                                                    <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Update Category</button>
                                                </button>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal -->

        <div id="modal" class="modal centered-div hidden fixed inset-0 z-[100] overflow-y-auto" aria-labelledby="modal-title" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div aria-hidden="true" class="centered-div  overflow-y-auto overflow-x-hidden  z-50 justify-center items-center w-full max-w-[450px] ">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Update Category
                                    </h3>

                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close <span class="sr-only">Close modal</span>
                                    </button>

                                </div>

                                <div class="p-4 md:p-5">
                                    <form method="post" id="updateCategoryForm" action="/api/category/updatecategory" class="space-y-4">
                                        <input id="idInput" type="hidden" name="id" value="" />
                                        <div>
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                            <input type="text" name="categoryname" id="nameInput" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                            <span id="updateCategoryError" class="ml-2 text-red-500"></span>
                                        </div>
                                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden z-[90] fixed inset-0 bg-black/50 backdrop-blur-sm bg-opacity-75"></div>


    </div>

    <script>
        async function updatecategory(id) {
            console.log(id);
            const modal = document.getElementById("modal");
            const backdrop = document.querySelector(".backdrop-blur-sm");
            modal.classList.remove("hidden");
            backdrop.classList.remove("hidden");

            let categorynam = "";

            try {
                const response = await fetch(`/api/category/getone?id=${id}`, {
                    method: 'GET',
                });

                const data = await response.json();

                if (response.ok) {
                    categorynam = data[0].name;
                }
                if (!response.ok) {

                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

            } catch (error) {
                console.error("Error during fetch:", error);
            }

            let idInput = document.getElementById("idInput");
            idInput.value = id;

            let nameInput = document.getElementById("nameInput");
            nameInput.value = categorynam;



        }



        const closeModalButtons = document.querySelectorAll("[data-bs-dismiss='modal']");
        closeModalButtons.forEach(button => {
            button.addEventListener("click", () => {
                const modal = document.getElementById("modal");
                const backdrop = document.querySelector(".backdrop-blur-sm");
                modal.classList.add("hidden");
                backdrop.classList.add("hidden");
            });
        });
    </script>

    <script src="./../js/formValidation.js"></script>
    <script src="./../js/categoriesCrud.js"></script>

</body>

</html>