<?php
$sub_page = isset($_GET['sub_page']) ? $_GET['sub_page'] : 'science';
$allowedSubPages = ['science', 'art', 'sport', 'economic'];
if (!in_array($sub_page, $allowedSubPages)) {
  $sub_page = 'science';
}
?>
<section class="wrapper">
  <article class="text-center">
    <h3>ბლოგი |
      <?php
      switch ($sub_page) {
        case "science": {
            echo "მეცნიერება";
            break;
          }
        case "art": {
            echo "ხელოვნება";
            break;
          }
        case "sport": {
            echo "სპორტი";
            break;
          }
        case "economic": {
            echo "ეკონომიკა";
            break;
          }
        default: {
            echo "მეცნიერება";
            break;
          }
      }
      ?>
    </h3>
  </article>
  <section class="blog_content">
    <?php
    $jsonString = file_get_contents('./assets/data/blog.json');
    $jsonData = json_decode($jsonString, true);

    if ($jsonData === null) {
      die('Error');
    }

    $datas = $jsonData[$sub_page];

    foreach ($datas as $data) {
      $title = $data['title'] ?? 'No title found';
      $description = $data['description'] ?? 'No description found';
      $imageSrc = $data['imageSrc'] ?? 'https://media3.giphy.com/media/3zhxq2ttgN6rEw8SDx/giphy.gif?cid=790b7611rgx4ijezxzs6xohzm2i67zi8dv8n4503qsy4yt3c&ep=v1_gifs_search&rid=giphy.gif&ct=g';
      $createdAt = $data['createdAt'] ?? 'No date found';
      ?>
      <div class="card">
        <img class="card-img-top" src="<?php echo $imageSrc; ?>" alt="<?php echo $title; ?>'s image">
        <div class="card-body">
          <h5 class="card-title">
            <?php echo $title; ?>
          </h5>
          <p class="card-text">
            <?php echo $description; ?>
          </p>
        </div>
        <div class="card-footer text-body-secondary">
          <p class="text-center m-0">
            <?php
            $date = new DateTime($createdAt);
            echo $date->format('Y-m-d H:i:s');
            ?>
          </p>
        </div>
      </div>
      <?php
    }
    ?>
  </section>
</section>