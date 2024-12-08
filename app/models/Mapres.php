<?php

class Mapres extends BaseModel
{
  protected $table = 'MAPRES';

  public function getDataMapres($presId)
  {
    $query = "SELECT * FROM MAPRES m INNER JOIN MAHASISWA mh ON mh.mahasiswa_id = m.mahasiswa_id INNER JOIN PENGGUNA p ON p.pengguna_id = mh.pengguna_id WHERE m.prestasi_id = :presId";

    $this->db->query($query);
    $this->db->bind('presId', $presId);
    return  $this->db->resultSet();
  }

  public function getMhsIdByName($nama)
  {
    $query = "SELECT m.mahasiswa_id FROM PENGGUNA p INNER JOIN MAHASISWA m ON p.pengguna_id = m.pengguna_id WHERE p.nama = :nama";

    $this->db->query($query);
    $this->db->bind(':nama', $nama);
    return $this->db->single()['mahasiswa_id'];
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

  public function updateDataMapres($data)
  {
    $mhsId = $this->getMhsIdByName($data['nama']);
    $query = "UPDATE MAPRES SET mahasiswa_id = :mhsId, peran = :peranMhs WHERE mapres_id = :mapresId";

    $this->db->query($query);
    $this->db->bind(":mhsId", $mhsId);
    $this->db->bind(':mapresId', $data['mapres_id']);
    $this->db->bind(':peranMhs', $data['peran']);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function getTopThreeMapres()
  {
    $query = "SELECT TOP 3 PG.nama AS nama_mahasiswa, COUNT(MP.prestasi_id) AS jumlah_prestasi, SUM(P.poin) AS total_poin FROM MAPRES MP JOIN MAHASISWA M ON M.mahasiswa_id = MP.mahasiswa_id JOIN PENGGUNA PG ON PG.pengguna_id = M.pengguna_id JOIN PRESTASI P ON P.prestasi_id = MP.prestasi_id GROUP BY PG.nama ORDER BY total_poin DESC";

    $this->db->query($query);
    $this->db->execute();
    return $this->db->resultSet();
  }
}
