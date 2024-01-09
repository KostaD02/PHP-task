<section class="wrapper">
  <article class="text-center">
    <h3>ბლოგის დამატება</h3>
  </article>
  <section class="contact">
    <form class="p-3 shadow rounded" method="POST" action="index.php?page=admin&sub_page=add_blog">
      <div class="mb-3">
        <label for="title" class="form-label">სათაური</label>
        <input type="text" placeholder="საინტერესო სახელი" class="form-control" id="title" name="title" minlength="2">
      </div>
      <div class="mb-3">
        <label for="imageSrc" class="form-label">სურათის მისამართი</label>
        <input type="url" placeholder="სურათის მისამართი" class="form-control" id="imageSrc" name="imageSrc">
      </div>
      <div class="mb-3">
        <label for="subject" class="form-label">ბლოგის ტიპი</label>
        <select name="subject" id="subject" class="form-select">
          <option value="science" selected>მეცნიერება</option>
          <option value="art">ხელოვნება</option>
          <option value="sport">სპორტი</option>
          <option value="economic">ეკონომიკა</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">აღწერა</label>
        <textarea placeholder="აღწერა ბლოგის" class="form-control" name="description" id="description" cols="30"
          rows="10" minlength="2" maxlength="1000"></textarea>
      </div>
      <div class="mb-3">
        <button class="btn btn-primary">გააგზავნე</button>
      </div>
    </form>
  </section>
</section>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $formData = array(
    'title' => $_POST['title'],
    'description' => $_POST['description'],
    'imageSrc' => $_POST['imageSrc'],
    'createdAt' => (new DateTime())->format('Y-m-d\TH:i:s\Z')
  );
  $existingData = json_decode(file_get_contents('./assets/data/blog.json'), true);
  $existingData[$_POST['subject']][] = $formData;
  file_put_contents('./assets/data/blog.json', json_encode($existingData));
  echo '
    <script>
      Swal.fire({
        title: "წარმატებული ოპერაცია",
        text: "თქვენი ბლოგი დაემატა წარმატებით",
        icon: "success"
      });
    </script>
  ';
  exit;
}
?>