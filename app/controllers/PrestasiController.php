<?php

class PrestasiController extends Controller
{
  public function index()
  {
    // $data['prestasi'] = $this->model('Prestasi')->getAllData();
    // $data['peserta'] = $this->model('Peserta')->getAllData();
    $this->view("mahasiswa/layout/sidebar");
    $this->view("mahasiswa/page/prestasi");
    $this->view("utils/footer");
  }

  public function addPrestasi()
  {
    $this->view("mahasiswa/layout/sidebar");
    $this->view("mahasiswa/page/tambahPrestasi");
    $this->view("utils/footer");
  }
}
