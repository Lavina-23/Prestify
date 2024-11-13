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
    $mahasiswa = ["Ahmad", "Budi", "Citra", "Dewi", "Eka"];
    $input = $_POST['keyword'];

    $results = array_filter($mahasiswa, function ($mhs) use ($input) {
      return stripos($mhs, $input) !== false;
    });

    echo json_encode(array_values($results));
  }
}
