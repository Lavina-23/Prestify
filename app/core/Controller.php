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
    $this->view("header");
    $this->view($view);
    $this->view("footer");
  }

  public function renderMainView($view)
  {
    $this->view("navbar");
    $this->view($view);
    $this->view("footer");
  }

  public function renderView($view, $data = [])
  {
    $this->view("sidebar");
    $this->view($view, $data);
    $this->view("footer");
  }
}
