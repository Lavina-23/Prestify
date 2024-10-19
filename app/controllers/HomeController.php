<?php

class HomeController extends Controller
{
  public function index()
  {
    $this->renderMainView("home/index");
  }
}
