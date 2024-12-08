<?php

class HomeController extends Controller
{
  public function index()
  {
    $data['leaderboard'] = $this->model('Mapres')->getTopThreeMapres();
    $order = [
      $data['leaderboard'][1],
      $data['leaderboard'][0],
      $data['leaderboard'][2],
    ];

    $data['leaderboard'] = $order;

    $this->view("layout/header");
    $this->view("layout/navbar");
    $this->view("home/index", $data);
    $this->view("layout/footer");
  }

  public function isLogin()
  {
    $status = isset($_SESSION['user_id']);
    return $status;
  }
}
