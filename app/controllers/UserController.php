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
        $_SESSION['level_id'] = $user['level_id'];

        if ($_SESSION['level_id'] == 'LVL2') {
          $this->renderDashboard("admin/index", $user);
        } else if ($_SESSION['level_id'] == 'LVL3') {
          $this->renderDashboard("mahasiswa/index", $user);
        } else {
          echo "You are not allowed to access this page";
        }

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
