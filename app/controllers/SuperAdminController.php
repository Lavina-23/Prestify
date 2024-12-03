<?php

class SuperAdminController extends Controller
{
  public function index()
  {
    if (isset($_SESSION['user_id']) && $_SESSION['level_id'] == 'LVL1') {
      $data['nama'] = $_SESSION['nama'] ?? 'Super Admin';
      $this->renderDashboard("super/index", $data);
    } else {
      header("Location:" . env("BASEURL") . "/user/login");
      exit();
    }
  }
}
