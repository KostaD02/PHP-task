<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'main';
$allowedPages = ['main', 'about', 'blog', 'contact', 'gallery'];
if (!in_array($page, $allowedPages)) {
  $page = 'main';
}
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?page=main">KD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a <?php echo ($page == 'main') ? 'class="nav-link active"' : 'class="nav-link"'; ?>
            href="index.php?page=main">მთავარი</a>
        </li>
        <li class="nav-item">
          <a <?php echo ($page == 'about') ? 'class="nav-link active"' : 'class="nav-link"'; ?>
            href="index.php?page=about">ჩვენს
            შესახებ</a>
        </li>
        <li class="nav-item">
          <a <?php echo ($page == 'blog') ? 'class="nav-link active"' : 'class="nav-link"'; ?>
            href="index.php?page=blog">ბლოგი</a>
        </li>
        <li class="nav-item">
          <a <?php echo ($page == 'gallery') ? 'class="nav-link active"' : 'class="nav-link"'; ?>
            href="index.php?page=gallery">გალერეა</a>
        </li>
        <li class="nav-item">
          <a <?php echo ($page == 'contact') ? 'class="nav-link active"' : 'class="nav-link"'; ?>
            href="index.php?page=contact">კონტაქტი</a>
        </li>
      </ul>
    </div>
  </div>
</nav>