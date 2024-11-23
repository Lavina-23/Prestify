<?php

class PrestasiController extends Controller
{
  public function index()
  {
    // $data['prestasi'] = $this->model('Prestasi')->getAllData();
    // $data['peserta'] = $this->model('Peserta')->getAllData();
    $this->view("layout/header");
    $this->view("layout/sidebar");
    $this->view("prestasi/prestasi");
    $this->view("layout/footer");
  }

  public function formDataKompetisi()
  {
    $this->view("layout/header");
    $this->view("layout/sidebar");
    $this->view("prestasi/add/indikator");
    $this->view("prestasi/add/dataKompetisi");
    $this->view("layout/footer");
  }

  public function formDataMahasiswa()
  {
    $this->view("layout/header");
    $this->view("layout/sidebar");
    $this->view("prestasi/add/indikator");
    $this->view("prestasi/add/dataMahasiswa");
    $this->view("layout/footer");
  }

  public function formDataDospem()
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

  public function addDataKompetisi()
  {
    $files = [];
    $allowedTypes = ['jpg', 'jpeg', 'png', 'pdf', 'docx'];
    $maxSize = 5 * 1_024 * 1_024;
    $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/Prestify/public/img/';

    foreach ($_FILES as $i => $file) {
      if (!empty($file['name'])) {
        $filename = basename($file['name']);
        $tmpname = $file['tmp_name'];
        $fileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $fileSize = $file['size'];

        if (in_array($fileType, $allowedTypes) && $fileSize <= $maxSize) {
          $newFileName = uniqid() . '.' . $fileType;
          $targetFile = $targetDir . $newFileName;

          if (move_uploaded_file($tmpname, $targetFile)) {
            $files[$i] = $newFileName;
          } else {
            echo "File " . $filename . " gagal diupload";
            exit;
          }
        } else {
          echo "Ekstensi file salah atau ukuran file melebihi batas.";
          exit;
        }
      }
    }

    if ($this->model('Prestasi')->addDataKompetisi($_POST, $files) > 0) {
      header('Location:' . env('BASEURL') . '/prestasi/formDataMahasiswa');
      exit;
    } else {
      echo "DATA GAGAL DIUPLOAD";
      exit;
    }
  }

  public function addDataMahasiswa()
  {
    $_SESSION['mahasiswa'] = $_POST;
    header('Location:' . env('BASEURL')) . '/prestasi/formDataDospem';
    exit;
  }

  public function addDataPrestasi()
  {
    $_SESSION['dospem'] = $_POST;

    $allDatas = array_merge($_SESSION['kompetisi'], $_SESSION['mahasiswa'], $_SESSION['dospem']);

    if ($this->model('Prestasi')->addDataPrestasi($allDatas, $_FILES) > 0) {
      unset($_SESSION['kompetisi'], $_SESSION['mahasiswa'], $_SESSION['dospem']);
      header('Location:' . env('BASEURL') . '/prestasi');
      exit;
    } else {
      echo "DATA GAGAL DIUPLOAD";
    }
  }
}
