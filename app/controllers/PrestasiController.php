<?php

class PrestasiController extends Controller
{
  public function index()
  {
    $user = $_SESSION['user_id'];
    if (!isset($user) || empty($user)) {
      header("Location:" . env("BASEURL") . "/user/login");
      exit();
    }

    $dataPrestasi['kompetisi'] = $this->model('Prestasi')->getDataPrestasi($user)['results'];

    foreach ($dataPrestasi['kompetisi'] as $prestasi) {
      $presId = $prestasi['prestasi_id'];
      $dataPrestasi['mapres'] = $this->model('Prestasi')->getDataMapres($presId);
      $dataPrestasi['dospem'] = $this->model('Prestasi')->getDataDospem($presId);
    }

    $this->view("layout/header");
    $this->view("layout/sidebar");

    if ($this->model('Prestasi')->getDataPrestasi($user)['rowCount'] > 0) {
      $this->view("prestasi/prestasi", $dataPrestasi);
    } else {
      $this->view("prestasi/zero");
    }

    $this->view("layout/footer");
  }

  public function formAddPrestasi()
  {
    $this->view("layout/header");
    $this->view("layout/sidebar");
    $this->view("prestasi/addPrestasi");
    $this->view("layout/footer");
  }

  public function searchMahasiswa()
  {
    if (isset($_POST['searchNama'])) {
      $namaMhs = $_POST['searchNama'];
      $datas = $this->model('Mahasiswa')->searchNamaMhs($namaMhs);

      echo '<ul class="text-sm text-gray-900" aria-labelledby="dropdownDefaultButton">';
      foreach ($datas as $data) {
        echo '<li>';
        echo '<button type="button" onclick="setNamaMhsId(' . $data["mahasiswa_id"] . ')" data-id="' . $data['mahasiswa_id'] . '" class="w-full text-left block px-4 py-1 hover:bg-gray-100">' . $data['nama'] . '</button>';
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

  public function addDataPrestasi()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $dataKompetisi = [
        'kategori_id' => $_POST['kategori_id'] ?? null,
        'nama_prestasi' => $_POST['nama_prestasi'] ?? null,
        'tingkat' => $_POST['tingkat'] ?? null,
        'peringkat' => $_POST['peringkat'] ?? null,
        'poin' => $_POST['poin'] ?? null,
        'penyelenggara' => $_POST['penyelenggara'] ?? null,
        'tempat_kompetisi' => $_POST['tempat_kompetisi'] ?? null,
        'link_kompetisi' => $_POST['link_kompetisi'] ?? null,
        'tanggal_mulai' => $_POST['tanggal_mulai'] ?? null,
        'tanggal_selesai' => $_POST['tanggal_selesai'] ?? null,
        'jumlah_peserta' => $_POST['jumlah_peserta'] ?? null,
        'no_surat_tugas' => $_POST['no_surat_tugas'] ?? null,
        'tanggal_surat' => $_POST['tanggal_surat'] ?? null,
        'jumlah_pt' => $_POST['jumlah_pt'] ?? null
      ];

      $dataFiles = $this->uploadFile($_FILES);
      $presId = $this->model('Prestasi')->addDataKompetisi($dataKompetisi, $dataFiles);

      $dataMapres = [
        'nama' => $_POST['namaMhs'] ?? [],
        'peran' => $_POST['peranMhs'] ?? []
      ];

      for ($i = 0; $i < count($dataMapres['nama']); $i++) {
        $this->model('Prestasi')->addDataMapres($presId, [
          'nama' => $dataMapres['nama'][$i],
          'peran' => $dataMapres['peran'][$i]
        ]);
      }

      $dataDospem = [
        'nama' => $_POST['namaDospem'] ?? [],
        'peran' =>  $_POST['peranDospem'] ?? []
      ];

      for ($i = 0; $i < count($dataDospem['nama']); $i++) {
        $this->model('Prestasi')->addDataDospem($presId, [
          'nama' => $dataDospem['nama'][$i],
          'peran' => $dataDospem['peran'][$i]
        ]);
      }

      header('Location:' . env('BASEURL') . '/prestasi');
      exit;
    }
  }

  public function uploadFile($dataFiles)
  {
    $files = [];
    $allowedTypes = ['jpg', 'jpeg', 'png', 'pdf', 'docx'];
    $maxSize = 5 * 1_024 * 1_024;
    $targetDir = "D:Program/laragon/www/Prestify/public/uploads/";

    foreach ($dataFiles as $i => $file) {
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
    return $files;
  }
}
