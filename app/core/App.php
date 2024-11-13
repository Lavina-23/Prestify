<?php

class App
{
  protected $controller = 'HomeController';
  protected $method = 'index';
  protected $params = [];

  public function __construct()
  {
    $url = $this->parseUrl();

    // controller
    if (isset($url[0]) && file_exists('../app/controllers/' . $url[0] . 'Controller.php')) {
      $this->controller = ucfirst($url[0]) . 'Controller';
      unset($url[0]);
    }

    require_once '../app/controllers/' . $this->controller . '.php';
    $this->controller = new $this->controller;

    // method
    if (isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    // parameter
    if (!empty($url)) {
      $this->params = array_values($url);
    }

    call_user_func_array([$this->controller, $this->method], $this->params); // Call a callback with an array of parameters
  }

  public function parseUrl()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['url'])) {
      $url = rtrim($_POST['url'], '/'); // rtrim() -> Remove characters from the right side of a string
    } else if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
    } else {
      return [];
    }

    $url = filter_var($url, FILTER_SANITIZE_URL); // membersihkan URL dari karakter-karakter ilegal yang tidak boleh ada dalam URL. Filter ini memastikan bahwa URL aman dari data berbahaya atau karakter yang tidak diinginkan.
    $url = explode('/', $url); // dijadikan array

    return $url;
  }
}
