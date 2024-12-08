<?php

class Dospem extends BaseModel
{
  protected $table = 'DOSPEM';

  public function getDataDospem($presId)
  {
    $query = "SELECT * FROM DOSPEM d INNER JOIN DOSEN dsn ON dsn.dosen_id = d.dosen_id WHERE d.prestasi_id = :presId";

    $this->db->query($query);
    $this->db->bind('presId', $presId);
    return  $this->db->resultSet();
  }

  public function getDsnIdByName($nama)
  {
    $query = "SELECT dosen_id FROM DOSEN WHERE nama = :nama";

    $this->db->query($query);
    $this->db->bind(':nama', $nama);
    return $this->db->single()['dosen_id'];
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

  public function updateDataDospem($data)
  {
    // var_dump($data);
    // exit;
    $dosenId = $this->getDsnIdByName($data['nama']);
    $query = "UPDATE DOSPEM SET dosen_id = :dosenId, peran = :peran WHERE dospem_id = :dospemId";

    $this->db->query($query);
    $this->db->bind(":dosenId", $dosenId);
    $this->db->bind(':dospemId', $data['dospem_id']);
    $this->db->bind(':peran', $data['peran']);
    $this->db->execute();

    return $this->db->rowCount();
  }
}
