<section class="wrapper">
  <article class="text-center">
    <h3>
      გალერეა |
      <?php
      $sub_page = isset($_GET['sub_page']) ? $_GET['sub_page'] : 'photo';
      $allowedSubPages = ['photo', 'video'];
      if (!in_array($sub_page, $allowedSubPages)) {
        $sub_page = 'photo';
      }
      if ($sub_page === 'photo') {
        echo "ფოტოები";
      } else {
        echo "ვიდეოები";
      }
      ?>
    </h3>
  </article>
  <section class="m-auto flex-center" style="gap: 20px">
    <a class="btn btn-primary" href="index.php?page=gallery&sub_page=photo">ფოტოები</a>
    <a class="btn btn-primary" href="index.php?page=gallery&sub_page=video">ვიდეოები</a>
  </section>
  <section class="gallery flex-center">
    <?php
    $jsonString = file_get_contents('./assets/data/media.json');
    $jsonData = json_decode($jsonString, true);

    if ($jsonData === null) {
      die('Error');
    }

    $datas = $jsonData[$sub_page];

    if ($sub_page === 'photo') {
      foreach ($datas as $data) {
        ?>
        <div class="image">
          <div class="overlay"></div>
          <img src="<?php echo $data; ?>" alt="Some random image">
        </div>
        <?php
      }
    } else {
      foreach ($datas as $data) {
        ?>
        <div class="video">
          <video src="<?php echo $data; ?>" controls></video>
        </div>
        <?php
      }
    }
    ?>
  </section>
</section>