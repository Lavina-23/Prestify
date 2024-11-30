<?php

class Prestasi extends BaseModel
{
  protected $table = 'PRESTASI';

  public function getDataPrestasi($user)
  {
    $query = "SELECT * FROM 
              PRESTASI p 
                LEFT JOIN MAPRES m ON p.prestasi_id = m.prestasi_id
                LEFT JOIN MAHASISWA mh ON mh.mahasiswa_id = m.mahasiswa_id
                LEFT JOIN PENGGUNA pg ON pg.pengguna_id = mh.pengguna_id
                LEFT JOIN KATEGORI_PRESTASI k ON k.kategori_id = p.kategori_id
                WHERE mh.pengguna_id = :user";

    $this->db->query($query);
    $this->db->bind('user', $user);
    return [
      'results' => $this->db->resultSet(),
      'rowCount' => $this->db->rowCount()
    ];
  }

  public function getAllDataPrestasi()
  {
    $query = "SELECT * FROM 
              PRESTASI p 
                INNER JOIN KATEGORI_PRESTASI k ON k.kategori_id = p.kategori_id";

    $this->db->query($query);
    return [
      'results' => $this->db->resultSet(),
      'rowCount' => $this->db->rowCount()
    ];
  }

  public function getDataMapres($presId)
  {
    $query = "SELECT * FROM MAPRES m INNER JOIN MAHASISWA mh ON mh.mahasiswa_id = m.mahasiswa_id INNER JOIN PENGGUNA p ON p.pengguna_id = mh.pengguna_id WHERE m.prestasi_id = :presId";

    $this->db->query($query);
    $this->db->bind('presId', $presId);
    return  $this->db->resultSet();
  }

  public function getDataDospem($presId)
  {
    $query = "SELECT * FROM DOSPEM d INNER JOIN DOSEN dsn ON dsn.dosen_id = d.dosen_id WHERE d.prestasi_id = :presId";

    $this->db->query($query);
    $this->db->bind('presId', $presId);
    return  $this->db->resultSet();
  }

  public function getTahunAkademik()
  {
    $currentMonth = date('n');
    $currentYear = date('Y');

    if ($currentMonth >= 8) {
      $startYear = $currentYear + 1;
      $endYear = $currentYear;
      $semester = "Ganjil";
    } else {
      $startYear = $currentYear - 1;
      $endYear = $currentYear;
      $semester = "Genap";
    }

    $tahunAkademik = $startYear . '/' . $endYear;
    return [
      'tahun_akademik' => $tahunAkademik,
      'semester' => $semester
    ];
  }

  public function addDataKompetisi($data, $files)
  {
    $presId = $this->generateId($this->table, 'prestasi_id', 'PRS');
    $tahunAkademik = $this->getTahunAkademik()['tahun_akademik'];
    $semester = $this->getTahunAkademik()['semester'];
    $isVerif = 0;

    if ($data['peringkat'] == 1) {
      $poin = 4;
    } else if ($data['peringkat'] == 2) {
      $poin = 3;
    } else if ($data['peringkat'] == 3) {
      $poin = 2;
    } else {
      $poin = 1;
    }

    $query = "INSERT INTO " . $this->table . "(prestasi_id, kategori_id, nama_prestasi, tingkat, peringkat, poin, penyelenggara, tempat_kompetisi, link_kompetisi, tanggal_mulai, tanggal_selesai, jumlah_peserta, no_surat_tugas, tanggal_surat, file_surat_tugas, file_sertifikat, file_foto_kegiatan, file_poster, jumlah_pt, tahun_akademik, semester, status_prestasi) VALUES (:prestasi_id, :kategori_id, :nama_prestasi, :tingkat, :peringkat, :poin, :penyelenggara, :tempat_kompetisi, :link_kompetisi, :tanggal_mulai, :tanggal_selesai, :jumlah_peserta, :no_surat_tugas, :tanggal_surat, :file_surat_tugas, :file_sertifikat, :file_foto_kegiatan, :file_poster, :jumlah_pt, :tahun_akademik, :semester, :status_prestasi)";

    $this->db->query($query);
    $this->db->bind(':prestasi_id', $presId);
    $this->db->bind(':kategori_id', $data['kategori_id']);
    $this->db->bind(':nama_prestasi', $data['nama_prestasi']);
    $this->db->bind(':tingkat', $data['tingkat']);
    $this->db->bind(':peringkat', $data['peringkat']);
    $this->db->bind(':poin', $poin);
    $this->db->bind(':penyelenggara', $data['penyelenggara']);
    $this->db->bind(':tempat_kompetisi', $data['tempat_kompetisi']);
    $this->db->bind(':link_kompetisi', $data['link_kompetisi']);
    $this->db->bind(':tanggal_mulai', $data['tanggal_mulai']);
    $this->db->bind(':tanggal_selesai', $data['tanggal_selesai']);
    $this->db->bind(':jumlah_peserta', $data['jumlah_peserta']);
    $this->db->bind(':no_surat_tugas', $data['no_surat_tugas']);
    $this->db->bind(':tanggal_surat', $data['tanggal_surat']);
    $this->db->bind(':file_surat_tugas', $files['file_surat_tugas']);
    $this->db->bind(':file_sertifikat', $files['file_sertifikat']);
    $this->db->bind(':file_foto_kegiatan', $files['file_foto_kegiatan']);
    $this->db->bind(':file_poster', $files['file_poster']);
    $this->db->bind(':jumlah_pt', $data['jumlah_pt']);
    $this->db->bind(':tahun_akademik', $tahunAkademik);
    $this->db->bind(':semester', $semester);
    $this->db->bind(':status_prestasi', $isVerif);

    $this->db->execute();
    if ($this->db->rowCount() > 0) {
      return $presId;
    }
  }

  public function getMhsIdByName($nama)
  {
    $query = "SELECT m.mahasiswa_id FROM PENGGUNA p INNER JOIN MAHASISWA m ON p.pengguna_id = m.pengguna_id WHERE p.nama = :nama";

    $this->db->query($query);
    $this->db->bind(':nama', $nama);
    return $this->db->single()['mahasiswa_id'];
  }

  public function getDsnIdByName($nama)
  {
    $query = "SELECT dosen_id FROM DOSEN WHERE nama = :nama";

    $this->db->query($query);
    $this->db->bind(':nama', $nama);
    return $this->db->single()['dosen_id'];
  }

  public function addDataMapres($presId, $data)
  {
    $mapresId = $this->generateId('MAPRES', 'mapres_id', 'MPR');
    $mahasiswa_id = $this->getMhsIdByName($data['nama']);
    $query = "INSERT INTO MAPRES(mapres_id, mahasiswa_id, prestasi_id, peran) VALUES (:mapres_id, :mahasiswa_id, :prestasi_id, :peran)";

    $this->db->query($query);
    $this->db->bind(':mapres_id', $mapresId);
    $this->db->bind(':mahasiswa_id', $mahasiswa_id);
    $this->db->bind(':prestasi_id', $presId);
    $this->db->bind(':peran', $data['peran']);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function addDataDospem($presId, $data)
  {
    $dospem_id = $this->generateId('DOSPEM', 'dospem_id', 'DSP');
    $dosen_id = $this->getDsnIdByName($data['nama']);
    $query = "INSERT INTO DOSPEM(dospem_id, dosen_id, prestasi_id, peran) VALUES (:dospem_id, :dosen_id, :prestasi_id, :peran)";

    $this->db->query($query);
    $this->db->bind(':dospem_id', $dospem_id);
    $this->db->bind(':dosen_id', $dosen_id);
    $this->db->bind(':prestasi_id', $presId);
    $this->db->bind(':peran', $data['peran']);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function updateVerif($id)
  {
    $query = "UPDATE " . $this->table . " SET status_prestasi = 1 WHERE prestasi_id = :id";

    $this->db->query($query);
    $this->db->bind(':id', $id);

    $this->db->execute();
    return $this->db->rowCount();
  }
}
