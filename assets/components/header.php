<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'main';
$allowedPages = ['main', 'about', 'blog', 'contact', 'gallery'];
if (!in_array($page, $allowedPages)) {
  $page = 'main';
}
$subPage = isset($_GET['sub_page']) ? $_GET['sub_page'] : '';
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">KD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a <?php echo ($page === 'main') ? 'class="nav-link active"' : 'class="nav-link"'; ?>
            href="index.php">მთავარი</a>
        </li>
        <li class="nav-item dropdown">
          <a <?php echo ($page === 'about') ? 'class="nav-link dropdown-toggle active"' : 'class="nav-link dropdown-toggle"'; ?> href="index.php?page=about&sub_page=history" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            ჩვენს შესახებ
          </a>
          <ul class="dropdown-menu">
            <li>
              <a <?php echo ($subPage === 'history') ? 'class="dropdown-item active"' : 'class="dropdown-item"' ?>
                href="index.php?page=about&sub_page=history">ისტორია</a>
            </li>
            <li>
              <a <?php echo ($subPage === 'about_company') ? 'class="dropdown-item active"' : 'class="dropdown-item"' ?>
                href="index.php?page=about&sub_page=about_company">კომპანიის შესახებ</a>
            </li>
            <li>
              <a <?php echo ($subPage === 'our_team') ? 'class="dropdown-item active"' : 'class="dropdown-item"' ?>
                href="index.php?page=about&sub_page=our_team">ჩვენი გუნდი</a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a <?php echo ($page === 'blog') ? 'class="nav-link dropdown-toggle active"' : 'class="nav-link dropdown-toggle"'; ?> href="index.php?page=blog&sub_page=science" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            ბლოგი
          </a>
          <ul class="dropdown-menu">
            <li>
              <a <?php echo ($subPage === 'science') ? 'class="dropdown-item active"' : 'class="dropdown-item"' ?>
                href="index.php?page=blog&sub_page=science">მეცნიერება</a>
            </li>
            <li>
              <a <?php echo ($subPage === 'art') ? 'class="dropdown-item active"' : 'class="dropdown-item"' ?>
                href="index.php?page=blog&sub_page=art">ხელოვნება</a>
            </li>
            <li>
              <a <?php echo ($subPage === 'sport') ? 'class="dropdown-item active"' : 'class="dropdown-item"' ?>
                href="index.php?page=blog&sub_page=sport">სპორტი</a>
            </li>
            <li>
              <a <?php echo ($subPage === 'economic') ? 'class="dropdown-item active"' : 'class="dropdown-item"' ?>
                href="index.php?page=blog&sub_page=economic">ეკონომიკა</a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a <?php echo ($page === 'gallery') ? 'class="nav-link dropdown-toggle active"' : 'class="nav-link dropdown-toggle"'; ?> href="index.php?page=gallery&sub_page=photo" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            გალერეა
          </a>
          <ul class="dropdown-menu">
            <li>
              <a <?php echo ($subPage === 'photo') ? 'class="dropdown-item active"' : 'class="dropdown-item"' ?>
                href="index.php?page=gallery&sub_page=photo">ფოტო გალერეა</a>
            </li>
            <li>
              <a <?php echo ($subPage === 'video') ? 'class="dropdown-item active"' : 'class="dropdown-item"' ?>
                href="index.php?page=gallery&sub_page=video">ვიდეო გალერეა</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a <?php echo ($page === 'contact') ? 'class="nav-link active"' : 'class="nav-link"'; ?>
            href="index.php?page=contact">კონტაქტი</a>
        </li>
      </ul>
    </div>
  </div>
</nav>