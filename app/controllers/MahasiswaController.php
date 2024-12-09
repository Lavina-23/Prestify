<?php

class MahasiswaController extends Controller
{
  public function index()
  {
    if (isset($_SESSION['user_id']) && $_SESSION['level_id'] == 'LVL3') {
      $data['nama'] = $_SESSION['nama'] ?? 'Champion';
      $data['totalPrestasi'] = ($this->model('Prestasi')->countPrestasiBySmt($_SESSION['user_id'])['totalPrestasi']) > 0 ?? 0;

      $this->renderDashboard("mahasiswa/index", $data);
    } else {
      header("Location:" . env("BASEURL") . "/user/login");
      exit();
    }
  }
}
