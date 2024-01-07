<section class="wrapper">
  <article class="text-center">
    <h3>კონტაქტი</h3>
  </article>
  <section class="contact">
    <form class="p-3 shadow rounded" method="POST" action="index.php?page=contact">
      <div class="mb-3">
        <label for="name" class="form-label">სახელი</label>
        <input type="text" placeholder="თქვენი სახელი" class="form-control" id="name" name="name" minlength="2"
          maxlength="22">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">მეილი</label>
        <input type="email" placeholder="თქვენი მეილი" class="form-control" id="email" name="email">
      </div>
      <div class="mb-3">
        <label for="message" class="form-label">მესიჯი</label>
        <textarea placeholder="თქვენი წერილი" class="form-control" name="message" id="message" cols="30" rows="10"
          minlength="2" maxlength="1000"></textarea>
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
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'message' => $_POST['message']
  );
  $existingData = json_decode(file_get_contents('./assets/data/contact.json'), true);
  $existingData[] = $formData;
  file_put_contents('./assets/data/contact.json', json_encode($existingData));
  echo '
    <script>
      Swal.fire({
        title: "წარმატებული ოპერაცია",
        text: "თქვენი მესიჯი წარმატებით გაიგზავნა",
        icon: "success"
      });
    </script>
  ';
  exit;
}
?>