<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;

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

    $dataPrestasi['mapres'] = [];
    $dataPrestasi['dospem'] = [];

    foreach ($dataPrestasi['kompetisi'] as $pres) {
      $prestasiId = $pres['prestasi_id'];

      $dataPrestasi['mapres'][$prestasiId] = $this->model('Mapres')->getDataMapres($prestasiId);
      $dataPrestasi['dospem'][$prestasiId] = $this->model('Dospem')->getDataDospem($prestasiId);
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

  public function allPrestasi()
  {
    $dataPrestasi['kompetisi'] = $this->model('Prestasi')->getAllDataPrestasi()['results'];

    foreach ($dataPrestasi['kompetisi'] as $prestasi) {
      $presId = $prestasi['prestasi_id'];
      $dataPrestasi['mapres'][$presId] = $this->model('Mapres')->getDataMapres($presId);
      $dataPrestasi['dospem'][$presId] = $this->model('Dospem')->getDataDospem($presId);
    }


    $this->view("layout/header");
    $this->view("layout/sidebar");

    if ($this->model('Prestasi')->getAllDataPrestasi()['rowCount'] > 0) {
      $this->view("prestasi/prestasi", $dataPrestasi);
    } else {
      $this->view("prestasi/zero");
    }

    $this->view("layout/footer");
  }

  public function showFormPrestasi($presId = null)
  {
    $this->view("layout/header");
    $this->view("layout/sidebar");

    if (isset($presId)) {
      $data['prestasi'] = $this->model('Prestasi')->getDataById('prestasi_id', $presId);
      $data['mapres'] = $this->model('Mapres')->getDataMapres($presId);
      $data['dospem'] = $this->model('Dospem')->getDataDospem($presId);

      $this->view("prestasi/formPrestasi", $data);
    } else {
      $this->view("prestasi/formPrestasi");
    }

    $this->view("layout/footer");
  }

  public function searchMahasiswa()
  {
    if (isset($_POST['searchNama'])) {
      $namaMhs = $_POST['searchNama'];
      $datas = $this->model('Mahasiswa')->searchNamaMhs($namaMhs);

      echo '<ul class="text-sm text-gray-900" aria-labelledby="dropdownDefaultButton">';
      foreach ($datas as $data) {
        echo '<li class="dropdown-item">';
        echo '<a class="block px-4 py-1 hover:bg-gray-100 cursor-pointer">' . htmlspecialchars($data['nama'], ENT_QUOTES, 'UTF-8') . '</a>';
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
        $this->model('Mapres')->addDataMapres($presId, [
          'nama' => $dataMapres['nama'][$i],
          'peran' => $dataMapres['peran'][$i]
        ]);
      }

      $dataDospem = [
        'nama' => $_POST['namaDospem'] ?? [],
        'peran' =>  $_POST['peranDospem'] ?? []
      ];

      for ($i = 0; $i < count($dataDospem['nama']); $i++) {
        $this->model('Dospem')->addDataDospem($presId, [
          'nama' => $dataDospem['nama'][$i],
          'peran' => $dataDospem['peran'][$i]
        ]);
      }

      header('Location:' . getMenu($_SESSION['level_id'], 'menu3')['route']);
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

  public function deleteDataPrestasi($presId)
  {
    if ($this->model('Prestasi')->deleteData('prestasi_id', $presId) > -1) {
      header('Location:' . env('BASEURL') . '/prestasi');
      exit;
    }
  }

  public function updateDataPrestasi($presId)
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

      $allDataKompetisi = array_merge($dataKompetisi, $dataFiles);
      $this->model('Prestasi')->updateData('PRESTASI', $allDataKompetisi, 'prestasi_id', $presId);

      $dataMapres = [
        'mapres_id' => $_POST['mapresId'] ?? [],
        'nama' => $_POST['namaMhs'] ?? [],
        'peran' => $_POST['peranMhs'] ?? []
      ];

      for ($i = 0; $i < count($dataMapres['nama']); $i++) {
        if (!empty($dataMapres['mapres_id'][$i])) {
          $this->model('Mapres')->updateDataMapres([
            'mapres_id' => $dataMapres['mapres_id'][$i],
            'nama' => $dataMapres['nama'][$i],
            'peran' => $dataMapres['peran'][$i]
          ]);
        } else {
          $this->model('Mapres')->addDataMapres($presId, [
            'nama' => $dataMapres['nama'][$i],
            'peran' => $dataMapres['peran'][$i]
          ]);
        }
      }

      $dataDospem = [
        'dospem_id' => $_POST['dospemId'],
        'nama' => $_POST['namaDospem'] ?? [],
        'peran' =>  $_POST['peranDospem'] ?? []
      ];

      for ($i = 0; $i < count($dataDospem['nama']); $i++) {
        if (!empty($dataDospem['dospem_id'][$i])) {
          $this->model('Dospem')->updateDataDospem([
            'dospem_id' => $dataDospem['dospem_id'][$i],
            'nama' => $dataDospem['nama'][$i],
            'peran' => $dataDospem['peran'][$i]
          ]);
        } else {
          $this->model('Dospem')->addDataDospem($presId, [
            'nama' => $dataDospem['nama'][$i],
            'peran' => $dataDospem['peran'][$i]
          ]);
        }
      }

      header('Location:' . env('BASEURL') . '/prestasi');
      exit;
    }
  }

  public function countPrestasi()
  {
    $data = $this->model('Prestasi')->countPrestasiByJurusan();
    echo json_encode($data);
  }

  public function countPrestasiMapres()
  {
    $data = $this->model('Prestasi')->countPrestasiByJurusan();
    echo json_encode($data);
  }

  public function isVerif($presId)
  {
    $status = $_POST['status'];
    if ($this->model('Prestasi')->updateVerif($presId, $status)) {
      header('Location:' . getMenu($_SESSION['level_id'], 'menu3')['route']);
      exit;
    }
  }

  public function exportReport()
  {
    require_once '../vendor/autoload.php';

    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

    if (isset($_POST['export'])) {
      $file = new Spreadsheet();
      $activeSheet = $file->getActiveSheet();

      $reportDatas['kompetisi'] = $this->model('Prestasi')->getAllDataPrestasi()['results'];

      foreach ($reportDatas['kompetisi'] as &$prestasi) {
        $presId = $prestasi['prestasi_id'];
        $prestasi['mapres'] = $this->model('Mapres')->getDataMapres($presId);
        $prestasi['dospem'] = $this->model('Dospem')->getDataDospem($presId);
      }

      if (empty($reportDatas['kompetisi'])) {
        die('No data to export.');
      }

      $activeSheet->setCellValue('A1', 'ID');
      $activeSheet->setCellValue('B1', 'Nama Prestasi');
      $activeSheet->setCellValue('C1', 'Kategori');
      $activeSheet->setCellValue('D1', 'Tingkat');
      $activeSheet->setCellValue('E1', 'Juara');
      $activeSheet->setCellValue('F1', 'Penyelenggara');
      $activeSheet->setCellValue('G1', 'Tempat');
      $activeSheet->setCellValue('H1', 'Mahasiswa');
      $activeSheet->setCellValue('I1', 'Dosen Pembimbing');

      $row = 2;
      foreach ($reportDatas['kompetisi'] as $prestasi) {
        $activeSheet->setCellValue('A' . $row, $prestasi['prestasi_id']);
        $activeSheet->setCellValue('B' . $row, $prestasi['nama_prestasi']);
        $activeSheet->setCellValue('C' . $row, $prestasi['nama_kategori']);
        $activeSheet->setCellValue('D' . $row, $prestasi['tingkat']);
        $activeSheet->setCellValue('E' . $row, $prestasi['peringkat']);
        $activeSheet->setCellValue('F' . $row, $prestasi['penyelenggara']);
        $activeSheet->setCellValue('G' . $row, $prestasi['tempat_kompetisi']);

        $activeSheet->setCellValue('H' . $row, "- " . implode("\n- ", array_column($prestasi['mapres'], 'nama')));
        $activeSheet->getStyle('H' . $row)->getAlignment()->setWrapText(true);

        $activeSheet->setCellValue('I' . $row, "- " . implode("\n- ", array_column($prestasi['dospem'], 'nama')));
        $activeSheet->getStyle('I' . $row)->getAlignment()->setWrapText(true);
        $row++;
      }

      $activeSheet->getColumnDimension('A')->setAutoSize(true);
      $activeSheet->getColumnDimension('B')->setAutoSize(true);
      $activeSheet->getColumnDimension('C')->setAutoSize(true);
      $activeSheet->getColumnDimension('D')->setAutoSize(true);
      $activeSheet->getColumnDimension('E')->setAutoSize(true);
      $activeSheet->getColumnDimension('F')->setAutoSize(true);
      $activeSheet->getColumnDimension('G')->setAutoSize(true);
      $activeSheet->getColumnDimension('H')->setAutoSize(true);
      $activeSheet->getColumnDimension('I')->setAutoSize(true);

      $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, 'Xls');
      $fileName = 'laporan_prestasi_' . time() . '.xls';

      try {
        $writer->save($fileName);
      } catch (\Exception $e) {
        die('Error writing file: ' . $e->getMessage());
      }

      header('Content-Type: application/vnd.ms-excel');
      header('Content-Transfer-Encoding: Binary');
      header('Cache-Control: max-age=0');
      header("Content-disposition: attachment; filename=\"" . $fileName . "\"");

      readfile($fileName);
      unlink($fileName);
      exit;
    }
  }
}
