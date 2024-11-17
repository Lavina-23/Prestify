<?php

class PrestasiController extends Controller
{
  public function index()
  {
    // $data['prestasi'] = $this->model('Prestasi')->getAllData();
    // $data['peserta'] = $this->model('Peserta')->getAllData();
    $this->view("layout/header");
    $this->view("layout/sidebar");
    $this->view("mahasiswa/page/prestasi");
    $this->view("layout/footer");
  }

  public function addDataKompetisi()
  {
    $this->view("layout/header");
    $this->view("layout/sidebar");
    $this->view("prestasi/add/indikator");
    $this->view("prestasi/add/dataKompetisi");
    $this->view("layout/footer");
  }

  public function addDataMahasiswa()
  {
    $this->view("layout/header");
    $this->view("layout/sidebar");
    $this->view("prestasi/add/indikator");
    $this->view("prestasi/add/dataMahasiswa");
    $this->view("layout/footer");
  }

  public function addDataDospem()
  {
    $this->view("layout/header");
    $this->view("layout/sidebar");
    $this->view("prestasi/add/indikator");
    $this->view("prestasi/add/dataDospem");
    $this->view("layout/footer");
  }

  public function searchMahasiswa()
  {
    if (isset($_POST['searchNama'])) {
      $namaMhs = $_POST['searchNama'];
      $datas = $this->model('User')->searchData($namaMhs);

      echo '<ul class="text-sm text-gray-900" aria-labelledby="dropdownDefaultButton">';
      foreach ($datas as $data) {
        echo '<li>';
        echo '<a class="block px-4 py-1 hover:bg-gray-100">' . $data['nama'] . '</a>';
        echo '</li>';
      }
      echo '</ul>';
    }
  }

  public function searchDospem()
  {
    if (isset($_POST['searchNama'])) {
      $namaDsn = $_POST['searchNama'];
      $datas = $this->model('Dosen')->searchData($namaDsn);

      echo '<ul class="text-sm text-gray-900" aria-labelledby="dropdownDefaultButton">';
      foreach ($datas as $data) {
        echo '<li>';
        echo '<a class="block px-4 py-1 hover:bg-gray-100">' . $data['nama'] . '</a>';
        echo '</li>';
      }
      echo '</ul>';
    }
  }
}
