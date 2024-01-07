<?php
$jsonStringPhotos = file_get_contents('./assets/data/media.json');
$jsonDataPhotos = json_decode($jsonStringPhotos, true);

if ($jsonDataPhotos === null) {
  die('Error');
}

$photos = $jsonDataPhotos['photo'];
?>
<section class="wrapper">
  <article class="text-center">
    <h3>მთავარი</h3>
  </article>
  <section class="slider">
    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        <?php
        foreach ($photos as $key => $photo) {
          ?>
          <div class="carousel-item <?php echo $key == 0 ? 'active' : ''; ?>">
            <img src="<?php echo $photo; ?>" class="d-block w-100" alt="slider image">
          </div>
          <?php
        }
        ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>
  <section class="blogs">
    <?php
    $jsonStringAbout = file_get_contents('./assets/data/blog.json');
    $jsonDataAbout = json_decode($jsonStringAbout, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
      die('Error');
    }

    foreach ($jsonDataAbout as $category => $posts) {
      if (!is_array($posts)) {
        // masivi ar aris
        continue;
      }

      if (count($posts) > 0) {
        $last3Posts = array_slice($posts, -min(3, count($posts)), 3);

        foreach ($last3Posts as $post) {
          $title = isset($post['title']) ? $post['title'] : 'N/A';
          $description = isset($post['description']) ? $post['description'] : 'N/A';
          $imageSrc = isset($post['imageSrc']) ? $post['imageSrc'] : 'N/A';
          $createdAt = isset($post['createdAt']) ? $post['createdAt'] : 'N/A';
          ?>
          <div class="post bg-body-tertiary">
            <aside class="left flex-center">
              <img src="<?php echo $imageSrc; ?>" alt="<?php echo $title; ?> image">
            </aside>
            <aside class="right">
              <h3>
                <?php echo $title; ?>
              </h3>
              <p>
                <?php echo $description; ?>
              </p>
              <hr>
              <p>
                <?php echo $createdAt; ?>
              </p>
            </aside>
          </div>
          <?php
        }
      }
    }
    ?>
  </section>
</section>