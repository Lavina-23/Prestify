<?php

class Controller
{
  public function view($view, $data = [])
  {
    require_once '../app/views/' . $view . '.php';
  }

  public function model($model)
  {
    require_once '../app/models/' . $model . '.php';
    return new $model;
  }

  public function render($view)
  {
    $this->view("layout/header");
    $this->view($view);
    $this->view("layout/footer");
  }

  public function renderDashboard($view, $data = [])
  {
    $this->view("layout/header");
    $this->view("layout/sidebar");
    $this->view($view, $data);
    $this->view("layout/profile", $data);
    $this->view("layout/footer");
  }
}
