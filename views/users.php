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

<body>

    <?php require_once "../views/includes/dashboard_nav.php" ?>

    <?php if ($_SESSION['user_role'] === 1) : ?>
        <?php require_once "../views/includes/admin_sidebar.php" ?>
    <?php else : ?>
        <?php require_once "../views/includes/author_sidebar.php" ?>
    <?php endif; ?>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 min-h-[100vh] bg-gray-200 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="flex flex-col my-6 mx-4 rounded-2xl shadow-xl shadow-gray-200">
                <div class="overflow-x-auto rounded-2xl">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow-lg">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed">
                                <thead class="bg-white">
                                    <tr>
                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            Name
                                        </th>

                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            Title
                                        </th>

                                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            Country
                                        </th>

                                        <th scope="col" class="p-4 lg:p-5"></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                    <?php foreach ($users as $user) : ?>
                                        <tr class="hover:bg-gray-100">
                                            <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap lg:p-5 lg:mr-0">
                                                <img class="w-8 h-8 rounded" src="/images/profile/<?= $user['src'] ?>" alt="<?= $user['alt'] ?>" />
                                                <div class="text-sm font-normal text-gray-500">
                                                    <div class="text-base font-semibold text-gray-900">
                                                        <?= $user['firstname']; ?> <?= $user['lastname']  ?>
                                                    </div>
                                                    <div class="text-sm font-normal text-gray-500">
                                                        <?= $user['email'] ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                                                <?= $user['title'] ?>
                                            </td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                                                United States
                                            </td>

                                            <td class="p-4 space-x-2 whitespace-nowrap lg:p-5">
                                                <button type="button" data-modal-toggle="delete-user-modal" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-br from-red-400 to-red-600 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                                                    <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Delete user
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
    </div>

</body>

</html>