<?php

class Mahasiswa extends Controller
{
  public function index()
  {
    $this->renderView("mahasiswa/index");
  }

  public function login()
  {
    $this->render("mahasiswa/login");
  }
}
