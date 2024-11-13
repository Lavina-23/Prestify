<?php

class HomeController extends Controller
{
  public function index()
  {
    $this->view("layout/navbar");
    $this->view("home/index");
    $this->view("layout/footer");
  }

  public function isLogin()
  {
    $status = isset($_SESSION['user_id']);
    return $status;
  }
}
