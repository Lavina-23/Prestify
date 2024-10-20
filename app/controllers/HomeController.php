<?php

class HomeController extends Controller
{
  public function index()
  {
    $this->view("home/layout/navbar");
    $this->view("home/page/index");
    $this->view("utils/footer");
  }
}
