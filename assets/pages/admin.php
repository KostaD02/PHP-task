<?php
if (!isset($_SESSION["user"])) {
  header("Location: index.php?page=admin_login");
  exit();
}
if (isset($_SESSION["user"])) {
  if ($_SESSION["user_type"] !== 'admin') {
    echo "
      <script>
        location.href = 'index.php';
      </script>
    ";
  }
}
?>