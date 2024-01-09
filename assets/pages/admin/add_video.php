<section class="wrapper">
  <section class="contact">
    <form class="p-3 shadow rounded" method="POST" action="index.php?page=admin&sub_page=add_video">
      <div class="mb-3">
        <label for="src" class="form-label">ვიდეოს მისამართი</label>
        <input type="url" placeholder="ვიდეოს მისამართი" class="form-control" id="src" name="src" required>
      </div>
      <div class="mb-3">
        <button class="btn btn-primary">გააგზავნე</button>
      </div>
    </form>
  </section>
</section>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $existingData = json_decode(file_get_contents('./assets/data/media.json'), true);
  $existingData['video'][] = $_POST['src'];
  file_put_contents('./assets/data/media.json', json_encode($existingData));
  echo '
    <script>
      Swal.fire({
        title: "წარმატებული ოპერაცია",
        text: "თქვენი ვიდეო წარმატებით დაემატა",
        icon: "success"
      });
    </script>
  ';
  exit;
}
?>