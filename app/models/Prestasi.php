<?php

class Prestasi extends BaseModel
{
  protected $table = 'prestasi';

  public function addDataKompetisi($data, $files)
  {
    $newPresId = $this->generateId($this->table, 'prestasi_id', 'PRS');

    if ($data['peringkat'] == 1) {
      $poin = 4;
    } else if ($data['peringkat'] == 2) {
      $poin = 3;
    } else if ($data['peringkat'] == 3) {
      $poin = 2;
    } else {
      $poin = 1;
    }

    $query = "INSERT INTO " . $this->table . "(prestasi_id, kategori_id, nama_prestasi, tingkat, peringkat, poin,
	penyelenggara, tempat_kompetisi, link_kompetisi, tanggal_mulai, tanggal_selesai, jumlah_peserta,
	no_surat_tugas, tanggal_surat, file_surat_tugas, file_sertifikat, file_foto_kegiatan, file_poster, jumlah_pt) VALUES (:prestasi_id, :kategori_id, :nama_prestasi, :tingkat, :peringkat, :poin, :penyelenggara, :tempat_kompetisi, :link_kompetisi, :tanggal_mulai, :tanggal_selesai, :jumlah_peserta, :no_surat_tugas, :tanggal_surat, :file_surat_tugas, :file_sertifikat, :file_foto_kegiatan, :file_poster, :jumlah_pt)";

    $this->db->query($query);
    $this->db->bind(':prestasi_id', $newPresId);
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

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function addDataMahasiswa($data, $presId)
  {
    $mapresId = $this->generateId('MAPRES', 'mapres_id', 'MPR');
    $query = "INSERT INTO " . $this->table . "(mapres_id, mahasiswa_id, prestasi_id, peran) VALUES (:mapres_id, :mahasiswa_id, :prestasi_id, :peran)";

    $this->db->query($query);
    $this->db->bind(':mapres_id', $mapresId);
    $this->db->bind(':mahasiswa_id', $data['mahasiswa_id']);
    $this->db->bind(':prestasi_id', $presId);
    $this->db->bind(':peran', $data['peran']);

    $this->db->execute();
    return $this->db->rowCount();
  }
}
