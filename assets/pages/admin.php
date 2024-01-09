<?php
if (!isset($_SESSION["user"])) {
  echo "
    <script>
      location.href = 'index.php?page=admin_login';
    </script>
  ";
}
if (isset($_SESSION["user"])) {
  if ($_SESSION["user_type"] !== 'admin') {
    echo "
      <script>
        location.href = 'index.php';
      </script>
    ";
  }
}
$sub_page = isset($_GET['sub_page']) ? $_GET['sub_page'] : 'edit_about';
$allowedSubPages = ['edit_about', 'add_blog', 'add_photo', 'add_video'];
if (!in_array($sub_page, $allowedSubPages)) {
  $sub_page = 'edit_about';
}
?>

<section class="wrapper">
  <article class="text-center">
    <h3>ადმინ პანელი |
      <?php
      switch ($sub_page) {
        case "edit_about": {
            echo "ჩვენს შესახებ რედაქტირება";
            break;
          }
        case "add_blog": {
            echo "ბლოგის დამატება";
            break;
          }
        case "add_photo": {
            echo "ფოტოს დამატება";
            break;
          }
        case "add_video": {
            echo "ვიდეოს დამატება";
            break;
          }
        default: {
            echo "ჩვენს შესახებ რედაქტირება";
            break;
          }
      }
      ?>
    </h3>
  </article>
  <section class="m-auto flex-center" style="gap: 20px;flex-wrap: wrap">
    <a class="btn btn-primary" href="index.php?page=admin&sub_page=edit_about">ჩვენს შესახებ რედაქტირება</a>
    <a class="btn btn-primary" href="index.php?page=admin&sub_page=add_blog">ბლოგის დამატება</a>
    <a class="btn btn-primary" href="index.php?page=admin&sub_page=add_photo">ფოტოს დამატება</a>
    <a class="btn btn-primary" href="index.php?page=admin&sub_page=add_video">ვიდეოს დამატება</a>
  </section>
  <section class="admin-panel-wrap">
    <?php include "./assets/pages/admin/" . $sub_page . ".php" ?>
  </section>
</section>