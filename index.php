<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  $page = isset($_GET['page']) ? $_GET['page'] : 'main';
  $allowedPages = ['main', 'about', 'blog', 'contact', 'gallery'];
  if (!in_array($page, $allowedPages)) {
    $page = 'main';
  }
  $sub_page = isset($_GET['sub_page']) ? $_GET['sub_page'] : '';
  $title = $sub_page === '' ? ucfirst($page) : ucfirst($page) . ' • ' . ucfirst($sub_page);
  echo "<title>$title</title>"
    ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/styles/style.css">
  <link rel="shortcut icon" href="https://avatars.githubusercontent.com/u/68782786?v=4" type="image/x-icon">
</head>

<body>
  <header class="fixed-top">
    <?php
    include './assets/components/header.php';
    ?>
  </header>
  <main class="container-xxl m-auto">
    <?php
    include './assets/pages/' . $page . '.php';
    ?>
  </main>
  <footer class="d-flex justify-content-center align-items-center bg-body-tertiary">
    <?php
    include './assets/components/footer.php';
    ?>
  </footer>
  <script src="https://kit.fontawesome.com/af6bc85f41.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>