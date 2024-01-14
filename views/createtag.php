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
        <div class="p-4 border-2 min-h-[90vh] bg-gray-200 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        </div>
    </div>

</body>

</html>