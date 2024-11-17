<?php

class MahasiswaController extends Controller
{
  public function index()
  {
    if (isset($_SESSION['user_id'])) {
      $data['nama'] = $_SESSION['nama'] ?? 'Champion';
      $this->renderDashboard("mahasiswa/index", $data);
    } else {
      header("Location:" . env("BASEURL") . "/user/login");
      exit();
    }
  }
}
