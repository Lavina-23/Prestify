<?php

class Home extends Controller
{
  public function index()
  {
    $this->renderMainView("home/index");
  }
}
