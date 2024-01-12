<?php
function shorten_title($title, $max_length = 25)
{
  $words = explode(" ", $title);
  $shortened_words = array_slice($words, 0, $max_length - 3);

  if (count($words) > $max_length - 3) {
    $shortened_words[] = "...";
  }

  return implode(" ", $shortened_words);
}

// var_dump($count)

?>

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

  <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
          </button>
          <a href="https://flowbite.com" class="flex ms-2 md:me-24">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="FlowBite Logo" />
            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Flowbite</span>
          </a>
        </div>
        <div class="flex items-center">
          <div class="flex items-center ms-3">
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo" />
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 dark:text-white" role="none">
                  B Sims
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                  neil.sims@flowbite.com
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Earnings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
        <li>
          <a href="/dashboard" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
              <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
              <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
            </svg>
            <span class="ms-3">Dashboard</span>
          </a>
        </li>

        <li>
          <a href="/dashboard/users" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
              <path d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z"></path>
            </svg>
            <span class="ms-3">Users</span>
          </a>
        </li>

        <li>
          <a href="/dashboard/wikies" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
              <path d="M3 5v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2zm7 2h8v2h-8V7zm0 4h8v2h-8v-2zm0 4h8v2h-8v-2zM6 7h2v2H6V7zm0 4h2v2H6v-2zm0 4h2v2H6v-2z"></path>
            </svg>
            <span class="ms-3">Articles</span>
          </a>
        </li>

        <li>
          <a href="/dashboard/tags" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg fill="currentColor" class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 21">
              <path d="M21.842 6.218a1.977 1.977 0 0 0-.424-.628A1.99 1.99 0 0 0 20 5H8c-.297 0-.578.132-.769.359l-5 6c-.309.371-.309.91 0 1.281l5 6c.191.228.472.36.769.36h12a1.977 1.977 0 0 0 1.41-.582A1.99 1.99 0 0 0 22 17V7c0-.266-.052-.525-.158-.782z"></path>
            </svg>

            <span class="ms-3">Tags</span>
          </a>
        </li>

        <li>
          <a href="/dashboard/categories" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 21" fill="currentColor">
              <path d="M4 11h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm10 0h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zM4 21h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1zm13 0c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4z"></path>
            </svg>
            <span class="ms-3">Categories</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>

  <div class="p-4 sm:ml-64">
    <div class="p-4 border-2 min-h-[90vh] bg-gray-200 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
      <div class="flex flex-col  my-6 mx-4 rounded-2xl shadow-xl shadow-gray-200">
        <div class="border-b border-gray-200 dark:border-gray-700">
          <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="tabs tabActive flex-grow  border-gray-300  rounded-t-2xl " role="presentation">
              <button class="inline-block  p-4 w-full rounded-t-lg" id="pending-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false" onclick="changeTab('pending', 'pending-tab')">
                Pending
                <span class="inline-flex items-center justify-center px-2 py-1 ms-2 text-xs font-semibold text-white bg-red-600 rounded-full">
                  <?= $count['0']['count'] ?>
                </span>
              </button>
            </li>

            <li class="tabs tabinActive flex-grow  border-gray-300  rounded-t-2xl " role="presentation">
              <button class="inline-block p-4 w-full rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="approved-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false" onclick="changeTab('approved', 'approved-tab')">
                Approved
              </button>
            </li>

            <li class="tabs tabinActive flex-grow  border-gray-300 rounded-t-2xl" role="presentation">
              <button class="inline-block p-4 w-full  rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="rejected-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false" onclick="changeTab('rejected', 'rejected-tab')">
                Rejected
              </button>
            </li>

            <li class="tabs tabinActive flex-grow  border-gray-300 rounded-t-2xl" role="presentation">
              <button class="inline-block p-4 w-full rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="all-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false" onclick="changeTab('all', 'all-tab')">
                All
              </button>
            </li>
          </ul>
        </div>

        <div id="default-tab-content">

          <div class="tabcontent  rounded-lg bg-gray-50 dark:bg-gray-800" id="pending" role="tabpanel" aria-labelledby="profile-tab">

            <div class="overflow-x-auto border-white  rounded-b-2xl ">
              <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden border-white shadow-lg">
                  <table class="min-w-full divide-y divide-gray-200 table-fixed">
                    <thead class="bg-white">
                      <tr>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                          User
                        </th>

                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                          Title
                        </th>

                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                          Category
                        </th>

                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                          Status
                        </th>
                        <th scope="col" class="p-4 lg:p-5"></th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      <?php foreach ($wikies as $wiki) : ?>
                        <?php if ($wiki['status'] === 1) : ?>
                          <tr class="hover:bg-gray-100">

                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                              <?php echo shorten_title($wiki['title'], 8) ?>
                            </td>

                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                              Artificial Intelligence
                            </td>

                            <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap lg:p-5">
                              <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-gray-400 mr-2"></div>
                                Pending
                              </div>
                            </td>

                            <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap lg:p-5 lg:mr-0">
                              <img class="w-8 h-8 rounded" src="https://demos.creative-tim.com/soft-ui-flowbite/images/users/neil-sims.png" alt="Neil Sims avatar" />
                              <div class="text-sm font-normal text-gray-500">
                                <div class="text-base font-semibold text-gray-900">
                                  A Sims
                                </div>
                                <div class="text-sm font-normal text-gray-500">
                                  neil.sims@flowbite.com
                                </div>
                              </div>
                            </td>

                            <td class="p-4 space-x-2 whitespace-nowrap lg:p-5">

                              <div class="flex gap-3">
                                <form method="post" action="/wiki/acceptaction">
                                  <input type="hidden" name="id" value="<?= $wiki['id'] ?>" />
                                  <button type="submit" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 hover:text-gray-900 hover:scale-[1.02] transition-all">
                                    <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                      <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                    </svg>
                                    Accept</button>
                                </form>

                                <form method="post" action="/wiki/rejectaction">
                                  <input type="hidden" name="id" value="<?= $wiki['id'] ?>" />
                                  <button type="submit" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-br from-red-400 to-red-600 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                                    <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    Reject
                                  </button>
                                </form>
                              </div>
                            </td>

                          </tr>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>



          </div>

          <div class="tabcontent hidden  rounded-lg bg-gray-50 dark:bg-gray-800" id="approved" role="tabpanel" aria-labelledby="dashboard-tab">
            <div class="overflow-x-auto border-white  rounded-b-2xl ">
              <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden border-white shadow-lg">
                  <table class="min-w-full divide-y divide-gray-200 table-fixed">
                    <thead class="bg-white">
                      <tr>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                          User
                        </th>

                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                          Title
                        </th>

                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                          Category
                        </th>

                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                          Status
                        </th>
                        <th scope="col" class="p-4 lg:p-5"></th>
                      </tr>

                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      <?php foreach ($wikies as $wiki) : ?>
                        <?php if ($wiki['status'] === 2) : ?>
                          <tr class="hover:bg-gray-100">

                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                              <?php echo shorten_title($wiki['title'], 8) ?>
                            </td>

                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                              Artificial Intelligence
                            </td>

                            <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap lg:p-5">
                              <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                                Approved
                              </div>
                            </td>

                            <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap lg:p-5 lg:mr-0">
                              <img class="w-8 h-8 rounded" src="https://demos.creative-tim.com/soft-ui-flowbite/images/users/neil-sims.png" alt="Neil Sims avatar" />
                              <div class="text-sm font-normal text-gray-500">
                                <div class="text-base font-semibold text-gray-900">
                                  A Sims
                                </div>
                                <div class="text-sm font-normal text-gray-500">
                                  neil.sims@flowbite.com
                                </div>
                              </div>
                            </td>

                            <td class="p-4 space-x-2 whitespace-nowrap lg:p-5">

                              <form method="post" action="/wiki/rejectaction">
                                <input type="hidden" name="id" value="<?= $wiki['id'] ?>" />
                                <button type="submit" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-br from-red-400 to-red-600 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                                  <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                  </svg>
                                  Reject
                                </button>
                              </form>

                            </td>

                          </tr>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="tabcontent hidden  rounded-lg bg-gray-50 dark:bg-gray-800" id="rejected" role="tabpanel" aria-labelledby="settings-tab">
            <div class="overflow-x-auto border-white  rounded-b-2xl ">
              <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden border-white shadow-lg">
                  <table class="min-w-full divide-y divide-gray-200 table-fixed">
                    <thead class="bg-white">
                      <tr>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                          User
                        </th>

                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                          Title
                        </th>

                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                          Category
                        </th>

                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                          Status
                        </th>
                        <th scope="col" class="p-4 lg:p-5"></th>
                      </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                      <?php foreach ($wikies as $wiki) : ?>
                        <?php if ($wiki['status'] === 3) : ?>
                          <tr class="hover:bg-gray-100">

                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">

                              <?php echo shorten_title($wiki['title'], 8) ?>
                            </td>

                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                              Artificial Intelligence
                            </td>

                            <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap lg:p-5">
                              <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                Rejected
                              </div>
                            </td>

                            <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap lg:p-5 lg:mr-0">
                              <img class="w-8 h-8 rounded" src="https://demos.creative-tim.com/soft-ui-flowbite/images/users/neil-sims.png" alt="Neil Sims avatar" />
                              <div class="text-sm font-normal text-gray-500">
                                <div class="text-base font-semibold text-gray-900">
                                  A Sims
                                </div>
                                <div class="text-sm font-normal text-gray-500">
                                  neil.sims@flowbite.com
                                </div>
                              </div>
                            </td>

                            <td class="p-4 space-x-2 whitespace-nowrap lg:p-5">
                              <form method="post" action="/wiki/acceptaction">
                                <input type="hidden" name="id" value="<?= $wiki['id'] ?>" />
                                <button type="submit" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 hover:text-gray-900 hover:scale-[1.02] transition-all">
                                  <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                  </svg>
                                  Accept</button>
                              </form>
                            </td>

                          </tr>
                        <?php endif; ?>
                      <?php endforeach; ?>

                    </tbody>

                  </table>
                </div>
              </div>
            </div>

          </div>

          <div class="tabcontent hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="all" role="tabpanel" aria-labelledby="contacts-tab">
            <div class="overflow-x-auto border-white  rounded-b-2xl ">
              <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden border-white shadow-lg">
                  <table class="min-w-full divide-y divide-gray-200 table-fixed">

                    <thead class="bg-white">
                      <tr>
                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                          Title
                        </th>

                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                          Category
                        </th>

                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                          Status
                        </th>

                        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                          User
                        </th>

                        <th scope="col" class="p-4 lg:p-5"></th>
                      </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                      <?php foreach ($wikies as $wiki) : ?>
                        <tr class="hover:bg-gray-100">

                          <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">

                            <?php echo shorten_title($wiki['title'], 8) ?>
                          </td>

                          <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                            Artificial Intelligence
                          </td>

                          <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap lg:p-5">
                            <div class="flex items-center">

                              <?php if ($wiki['status'] === 1) : ?>
                                <div class="h-2.5 w-2.5 rounded-full bg-gray-400 mr-2"></div>
                                Pending

                              <?php elseif ($wiki['status'] === 2) : ?>
                                <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                                Approved

                              <?php elseif ($wiki['status'] === 3) : ?>
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                Rejected
                              <?php endif; ?>

                            </div>
                          </td>

                          <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap lg:p-5 lg:mr-0">
                            <img class="w-8 h-8 rounded" src="https://demos.creative-tim.com/soft-ui-flowbite/images/users/neil-sims.png" alt="Neil Sims avatar" />
                            <div class="text-sm font-normal text-gray-500">
                              <div class="text-base font-semibold text-gray-900">
                                A Sims
                              </div>
                              <div class="text-sm font-normal text-gray-500">
                                neil.sims@flowbite.com
                              </div>
                            </div>
                          </td>

                          <td class="p-4 space-x-2 whitespace-nowrap lg:p-5">
                            <?php if ($wiki['status'] === 1) : ?>
                              <div class="flex gap-3">
                                <form method="post" action="/wiki/acceptaction">
                                  <input type="hidden" name="id" value="<?= $wiki['id'] ?>" />
                                  <button type="submit" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 hover:text-gray-900 hover:scale-[1.02] transition-all">
                                    <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                      <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                    </svg>
                                    Accept</button>
                                </form>

                                <form method="post" action="/wiki/rejectaction">
                                  <input type="hidden" name="id" value="<?= $wiki['id'] ?>" />
                                  <button type="submit"  class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-br from-red-400 to-red-600 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                                    <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    Reject
                                  </button>
                                </form>
                              </div>

                            <?php elseif ($wiki['status'] === 2) : ?>
                              <form method="post" action="/wiki/rejectaction">
                                <input type="hidden" name="id" value="<?= $wiki['id'] ?>" />
                                <button type="submit" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-br from-red-400 to-red-600 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                                  <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                  </svg>
                                  Reject
                                </button>
                              </form>
                            <?php elseif ($wiki['status'] === 3) : ?>
                              <form method="post" action="/wiki/acceptaction">
                                <input type="hidden" name="id" value="<?= $wiki['id'] ?>" />
                                <button type="submit" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 hover:text-gray-900 hover:scale-[1.02] transition-all">
                                  <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                  </svg>
                                  Accept</button>
                              </form>
                            <?php endif; ?>
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
    </div>
  </div>

  <script>
    function changeTab(tabId, tabelm) {
      // Hide all tab content
      var tabContents = document.querySelectorAll('.tabcontent');
      var tabs = document.querySelectorAll('.tabs');

      tabContents.forEach(function(content) {
        content.classList.add('hidden');
      });

      tabs.forEach((elm) => {
        elm.classList.remove('tabActive');
        elm.classList.add('tabinActive');
      })

      var selectedTab = document.getElementById(tabelm);
      selectedTab.parentElement.classList.remove('tabinActive');
      selectedTab.parentElement.classList.add('tabActive');

      // Show the selected tab content
      var selectedTab = document.getElementById(tabId);
      selectedTab.classList.remove('hidden');
    }

    function confirmSubmit() {
      var agree = confirm("Are you sure you want to submit the form?");
      if (agree) {
        return true;
      } else {
        return false;
      }
    }
  </script>
</body>

</html>