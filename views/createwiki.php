<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../dist/output.css">
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
    <div class="p-4 border-2 min-h-[100vh] bg-gray-200 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
      <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
          <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
            <div class="flex items-center">
              <p class="mb-0 dark:text-white/80">Create Wiki</p>
            </div>
          </div>

          <form id="addwikiForm" method="post" action="/api/wiki/create" class="flex-auto p-6">
            <input name="author" type="hidden" value="<?= $_SESSION['user_id'] ?>">
            <input name="tags" type="hidden" value="36, 40">

            <div class="flex flex-wrap -mx-3">
              <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                <div class="mb-4">
                  <label for="title" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Title</label>
                  <input type="text" name="title" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                </div>
              </div>

              <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                <div class="mb-4">
                  <label for="category" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Category</label>
                  <select name="category" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                    <option value="" selected disabled>Catgories</option>
                    <?php foreach ($categories as $category) : ?>
                      <option value="<?= $category['id'] ?>">
                        <?= $category['name'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                <div class="mb-4">
                  <label for="header_img" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Header Image</label>
                  <input type="file" name="header_img" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                </div>
              </div>

            </div>

            <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

            <div class="flex flex-wrap -mx-3">
              <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                <div class="mb-4">
                  <label for="description" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Description</label>
                  <textarea name="description" rows="5" placeholder="summary for this article" class="noteditor focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></textarea>
                </div>
              </div>
            </div>

            <div class="flex flex-wrap -mx-3">
              <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                <div class="mb-4">
                  <label for="content" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Content</label>
                  <textarea class="myTextEditor" name="content"> </textarea>
                </div>
              </div>
            </div>

            <button type="submit" href="/dashboard/createwiki" data-modal-toggle="delete-user-modal" class="inline-flex items-center w-fit mb-5 py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255)">
                <path d="M19 11h-6V5h-2v6H5v2h6v6h2v-6h6z"></path>
              </svg>
              Create New Wiki
            </button>

          </form>
          <div id="selectedValuesDisplay">

          </div>

        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.tiny.cloud/1/14gb2y6rjnk0b2ifli10mxiep8tezzcu0kl5ktmg9jqw1f6r/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: "textarea.myTextEditor",
      plugins: "anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount",
      toolbar: "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat",
    });
  </script>
</body>

<script src="./../js/formValidation.js"></script>
<script src="./../js/wikiesCrud.js"></script>

</html>