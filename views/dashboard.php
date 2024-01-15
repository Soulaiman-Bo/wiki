<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./dist/output.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body>

    <?php require_once "../views/includes/dashboard_nav.php" ?>

    <?php if ($_SESSION['user_role'] === 1) : ?>
        <?php require_once "../views/includes/admin_sidebar.php" ?>
    <?php else : ?>
        <?php require_once "../views/includes/author_sidebar.php" ?>
    <?php endif; ?>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 bg-gray-200 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full  sm:my-8">
                        <div class="bg-white p-5">
                            <div class="sm:flex sm:items-start">
                                <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                    <h3 class="text-sm leading-6 font-medium text-gray-400">Total Users</h3>
                                    <p class="text-3xl font-bold text-black"><?= $users[0]['users'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full  sm:my-8">
                        <div class="bg-white p-5">
                            <div class="sm:flex sm:items-start">
                                <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                    <h3 class="text-sm leading-6 font-medium text-gray-400">Total Of Categories</h3>
                                    <p class="text-3xl font-bold text-black"><?= $categories[0]['categories'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full  sm:my-8">
                        <div class="bg-white p-5">
                            <div class="sm:flex sm:items-start">
                                <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                                    <h3 class="text-sm leading-6 font-medium text-gray-400">Total Of Wikies</h3>
                                    <p class="text-3xl font-bold text-black"><?= $wiki[0]['Wikies'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">

                <div class="rounded dark:bg-gray-800">
                    <div class="border-black/12.5 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                        <div class="p-4 pb-0 rounded-t-4">
                            <h6 class="mb-0 dark:text-white">Most Used Tags</h6>
                        </div>
                        <div class="flex-auto p-4">
                            <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                                <?php foreach ($toptags as $tag) : ?>
                                    <li class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-t-lg rounded-xl text-inherit">
                                        <div class="flex items-center">
                                            <div class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 rounded-xl">
                                            </div>
                                            <div class="flex flex-col">
                                                <h6 class="mb-1 text-sm leading-normal text-slate-700 dark:text-white"><?= $tag['name']?></h6>
                                                <span class="text-xs leading-tight dark:text-white/80"> <span class="font-semibold"><?= $tag['TOTAL']?></span></span>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <button class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all dark:text-white"><i class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></button>
                                        </div>
                                    </li>
                                <?php endforeach; ?>


                            </ul>
                        </div>
                    </div>
                </div>

                <div class="rounded dark:bg-gray-800">
                    <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border">
                        <div class="p-4 pb-0 mb-0 rounded-t-4">
                            <div class="flex justify-between">
                                <h6 class="mb-2 dark:text-white">Top Users</h6>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40">
                                <tbody>
                                    <?php foreach ($topUsers as $user) : ?>
                                        <tr>
                                            <td class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                                <div class="flex items-center px-2 py-1">

                                                    <div class="ml-6">
                                                        <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"><?= $user['firstname'] ?> <?= $user['lastname'] ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                                <div class="text-center">
                                                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Number Of Wikies Posted:</p>
                                                </div>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                                <div class="text-center">
                                                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60"></p>
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white"><?= $user['num'] ?></h6>
                                                </div>
                                            </td>
                                            <!-- <td class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                                <div class="flex-1 text-center">
                                                    <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">Bounce:</p>
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">29.9%</h6>
                                                </div>
                                            </td> -->
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