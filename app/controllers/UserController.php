<?php

require_once '../app/models/User.php';

class UserController extends Controller
{
  private $userModel;

  public function __construct()
  {
    $this->userModel = new User;
  }

  public function index()
  {
    $this->renderView("user/index");
  }

  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $user = $this->userModel->login($username, $password);

      if ($user) {
        $_SESSION['user_id'] = $user['pengguna_id'];
        header("Location:" . env("BASEURL") . "/mahasiswa/index");
        exit();
      } else {
        echo "Username dan password salah";
      }
    }

    $this->render("user/login");
  }

  // public function index()
  // {
  //   session_start();
  //   if (!isset($_SESSION['user_id'])) {
  //     header("Location:" . env("BASEURL") . "/user/login");
  //     exit();
  //   }
  //   $this->render("user/index");
  // }

  // public function logout()
  // {
  //   session_start();
  //   session_destroy();
  //   header("Location:" . env("BASEURL") . "/user/login");
  //   exit();
  // }
}
