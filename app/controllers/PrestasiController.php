<?php

class PrestasiController extends Controller
{
  public function index()
  {
    $data['prestasi'] = $this->model('Prestasi')->getAllPrestasi();
    $this->view("mahasiswa/layout/sidebar");
    $this->view("mahasiswa/page/prestasi", $data);
    $this->view("utils/footer");
  }

  public function addPrestasi() {}
}