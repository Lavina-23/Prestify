<?php

class AdminController extends Controller
{
  public function index()
  {
    if (isset($_SESSION['user_id'])) {
      $data['nama'] = $_SESSION['nama'] ?? 'Admin';
      $this->renderDashboard("admin/page/index", $data);
    } else {
      header("Location:" . env("BASEURL") . "/user/login");
      exit();
    }
  }
}
