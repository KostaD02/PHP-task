<?php
$sub_page = isset($_GET['sub_page']) ? $_GET['sub_page'] : 'history';
$allowedSubPages = ['history', 'about_company', 'our_team'];
if (!in_array($sub_page, $allowedSubPages)) {
  $sub_page = 'history';
}

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
  <article>
    <?php
    switch ($sub_page) {
      case "history": {
          include './assets/components/history.php';
          break;
        }
      case "about_company": {
          include './assets/components/about_company.php';
          break;
        }
      case "our_team": {
          echo "<section class='flex-center'>";
          include './assets/components/our_team.php';
          echo "</section>";
          break;
        }
      default: {
          include './assets/components/history.php';
          break;
        }
    }
    ?>
  </article>
</section>