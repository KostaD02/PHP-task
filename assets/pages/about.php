<?php
$sub_page = isset($_GET['sub_page']) ? $_GET['sub_page'] : 'history';
$allowedSubPages = ['history', 'about_company', 'our_team'];
if (!in_array($sub_page, $allowedSubPages)) {
  $sub_page = 'history';
}

$jsonString = file_get_contents('./assets/data/about.json');
$jsonData = json_decode($jsonString, true);

if ($jsonData === null) {
  die('Error');
}

$data = $jsonData[$sub_page];

?>
<section class="wrapper">
  <article class="text-center">
    <h3>
      ჩვენს შესახებ |
      <?php
      switch ($sub_page) {
        case "history": {
            echo "ისტორია";
            break;
          }
        case "about_company": {
            echo "კომპანიის შესახებ";
            break;
          }
        case "our_team": {
            echo "ჩვენი გუნდი";
            break;
          }
        default: {
            echo "ისტორია";
            break;
          }
      }
      ?>
    </h3>
    <hr>
  </article>
  <section class="m-auto flex-center" style="gap: 20px">
    <a class="btn btn-primary" href="index.php?page=about&sub_page=history">ისტორია</a>
    <a class="btn btn-primary" href="index.php?page=about&sub_page=about_company">კომპანიის შესახებ</a>
    <a class="btn btn-primary" href="index.php?page=about&sub_page=our_team">ჩვენი გუნდი</a>
  </section>
  <article>
    <?php
    switch ($sub_page) {
      case "history": {
          echo $data;
          break;
        }
      case "about_company": {
          echo $data;
          break;
        }
      case "our_team": {
          echo "<section class='flex-center' style='gap: 16px'>";
          foreach ($data as $member) {
            $email = $member['socials']['email'] ?? '';
            $github = $member['socials']['github'] ?? '';
            $facebook = $member['socials']['facebook'] ?? '';
            $personal_website = $member['socials']['personal_website'] ?? '';
            ?>
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="<?php echo $member['imageSrc']; ?>" alt="<?php echo $member['name']; ?>'s image">
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $member['name'] . ' ' . $member['lastName']; ?>
                </h5>
                <p class="card-text">
                  როლი:
                  <?php echo $member['role']; ?>
                  <br>
                  ასაკი:
                  <?php echo $member['age']; ?>
                </p>
              </div>
              <div class="card-footer">
                <ul class="socials flex-center" style="list-style: none">
                  <?php echo $email ? '<li><a href="mailto:' . $email . '"><i class="fa-solid fa-envelope"></i></a></li>' : ''; ?>
                  <?php echo $github ? '<li><a href="' . $github . '" target="_blank"><i class="fa-brands fa-github"></i></a></li>' : ''; ?>
                  <?php echo $facebook ? '<li><a href="' . $facebook . '" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>' : ''; ?>
                  <?php echo $personal_website ? '<li><a href="' . $personal_website . '" target="_blank"><i class="fa-brands fa-chrome"></i></a></li>' : ''; ?>
                </ul>
              </div>
            </div>
            <?php
          }
          echo "</section>";
          break;
        }
      default: {
          echo $data;
          break;
        }
    }
    ?>
  </article>
</section>