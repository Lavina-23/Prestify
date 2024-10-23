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
    $this->view("utils/header");
    $this->view($view);
    $this->view("utils/footer");
  }

  public function renderMahasiswa($view, $data = [])
  {
    $this->view("mahasiswa/layout/sidebar");
    $this->view($view, $data);
    $this->view("mahasiswa/layout/profile");
    $this->view("utils/footer");
  }
}
