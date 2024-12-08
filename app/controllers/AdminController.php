<?php

class AdminController extends Controller
{
  public function index()
  {
    if (isset($_SESSION['user_id']) && $_SESSION['level_id'] == 'LVL2') {
      $data['nama'] = $_SESSION['nama'] ?? 'Admin';
      $this->renderDashboard("admin/index", $data);
    } else {
      header("Location:" . env("BASEURL") . "/user/login");
      exit();
    }
  }
}
