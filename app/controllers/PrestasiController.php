<?php

class PrestasiController extends Controller
{
  public function index()
  {
    // $data['prestasi'] = $this->model('Prestasi')->getAllData();
    // $data['peserta'] = $this->model('Peserta')->getAllData();
    $this->view("layout/sidebar");
    $this->view("mahasiswa/page/prestasi");
    $this->view("layout/footer");
  }

  public function addDataKompetisi()
  {
    $this->view("layout/sidebar");
    $this->view("mahasiswa/components/indikator");
    $this->view("mahasiswa/components/dataKompetisi");
    $this->view("layout/footer");
  }

  public function addDataMahasiswa()
  {
    $this->view("layout/sidebar");
    $this->view("mahasiswa/components/indikator");
    $this->view("mahasiswa/components/dataMahasiswa");
    $this->view("layout/footer");
  }

  public function searchMahasiswa()
  {
    if (isset($_POST['searchMhs'])) {
      $namaMhs = $_POST['searchMhs'];
      $datas = $this->model('User')->searchData($namaMhs);

      echo '<ul class="text-sm text-gray-900" aria-labelledby="dropdownDefaultButton">';
      foreach ($datas as $data) {
        echo '<li onclick="fillNamaMhs(\'' . $data['nama'] . '\')">';
        echo '<a class="block px-4 py-1 hover:bg-gray-100">' . $data['nama'] . '</a>';
        echo '</li>';
      }
      echo '</ul>';
    }
  }
}
