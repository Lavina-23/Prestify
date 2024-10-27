<?php

require_once '../app/models/User.php';

class UserController extends Controller
{
  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $user = $this->model('User')->login($username, $password);

      if ($user) {
        $_SESSION['user_id'] = $user['pengguna_id'];
        $_SESSION['nama'] = $user['nama'];

        $this->renderDashboard("mahasiswa/page/index", $user);
        exit();
      } else {
        echo "Username dan password salah";
      }
    }

    $this->render("login");
  }

  public function logout()
  {
    session_destroy();
    header("Location:" . env("BASEURL"));
    exit();
  }
}
