<?php

class App
{
  protected $controller = 'HomeController';
  protected $method = 'index';
  protected $params = [];

  public function __construct()
  {
    $url = $this->parseUrl();

    // Controller
    if (isset($url[0]) && file_exists('../app/controllers/' . $url[0] . 'Controller.php')) {
      $this->controller = ucfirst($url[0]) . 'Controller';
      unset($url[0]);
    }

    require_once '../app/controllers/' . $this->controller . '.php';
    $this->controller = new $this->controller;

    // Method
    if (isset($url[1]) && method_exists($this->controller, $url[1])) {
      $this->method = $url[1];
      unset($url[1]);
    }

    // Parameters from URL path
    $pathParams = !empty($url) ? array_values($url) : [];

    // Merge with query string parameters
    $queryParams = $_GET; // Semua query string seperti ?action=insert
    unset($queryParams['url']); // Hapus key 'url' jika ada
    $this->params = array_merge($pathParams, $queryParams);

    // Call the controller method with parameters
    call_user_func_array([$this->controller, $this->method], [$this->params]);
  }

  public function parseUrl()
  {
    $url = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['url'])) {
      $url = rtrim($_POST['url'], '/');
    } else if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
    }

    $urlArray = explode('/', filter_var($url, FILTER_SANITIZE_URL));

    // Kembalikan array query string
    foreach ($_GET as $key => $value) {
      if ($key !== 'url') {
        $urlArray['params'][$key] = $value;
      }
    }

    return $urlArray;
  }
}
