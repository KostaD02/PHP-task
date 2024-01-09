<?php
require("./assets/classes/login.class.php");
if (isset($_POST["submit"])) {
  $user = new LoginUser($_POST['email'], $_POST['password']);
}
?>
<section class="wrapper-auth flex-center">
  <form action="" method="POST" autocomplete="off" class="w-75 shadow rounded p-4" style="max-width: 500px;">
    <div class="mb-3">
      <h2>ავტორიზაცია</h2>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">იმეილი</label>
      <input type="email" name="email" id="email" placeholder="შეიყვანეთ თქვენი იმეილი" class="form-control"
        value="kdautinishvili@gmail.com">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">პაროლი</label>
      <input type="password" name="password" id="password" placeholder="შეიყვანეთ თქვენი იმეილი" class="form-control"
        value="testdev22K">
    </div>
    <div class="mb-3">
      <?php echo @$user->error ? '<p class="text-bg-danger p-1">' . @$user->error . '</p>' : '' ?>
    </div>
    <div class="mb-3">
      <button type="submit" name="submit" class="btn btn-primary">ავტორიზაცია</button>
    </div>
  </form>
</section>