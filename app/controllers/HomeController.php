<?php

class HomeController extends Controller
{
  public function index()
  {
    $data['leaderboard'] = $this->model('Mapres')->getTopThreeMapres();

    $this->view("layout/header");
    $this->view("layout/navbar");

    if (!empty($data['leaderboard'])) {
      $order = [
        $data['leaderboard'][1],
        $data['leaderboard'][0],
        $data['leaderboard'][2],
      ];

      $data['leaderboard'] = $order;
      $this->view("home/index", $data);
    } else {
      $this->view("home/index");
    }
    $this->view("layout/footer");
  }

  public function isLogin()
  {
    $status = isset($_SESSION['user_id']);
    return $status;
  }
}
