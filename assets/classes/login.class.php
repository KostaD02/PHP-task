<?php
class LoginUser
{
  private $email;
  private $password;
  private $userType;
  public $error;
  private $storage = "./assets/data/user.json";
  private $stored_users;

  public function __construct($email, $password)
  {
    $this->email = $email;
    $this->password = $password;
    $this->stored_users = json_decode(file_get_contents($this->storage), true);
    $this->login();
  }

  public function login()
  {
    if ($this->email === '' || $this->password === '') {
      return $this->error = "შეავსეთ მონაცემები";
    }
    foreach ($this->stored_users as $user) {
      if ($user['email'] === $this->email) {
        if ($user['password'] === $this->password) {
          $_SESSION['user'] = $this->email;
          $_SESSION['user_type'] = $user['userType'];
          echo "
            <script>
              location.href = 'index.php';
            </script>
          ";
          return true;
        }
      }
    }
    return $this->error = "არასწორი პაროლი ან ლოგინი";
  }
}
?>