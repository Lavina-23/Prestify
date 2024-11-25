<?php

class Mahasiswa extends BaseModel
{
  protected $table = 'MAHASISWA';

  public function searchNamaMhs($nama)
  {
    $query = "SELECT * FROM PENGGUNA p RIGHT JOIN " . $this->table . " m ON p.pengguna_id = m.pengguna_id WHERE p.nama LIKE :nama";

    $this->db->query($query);
    $this->db->bind('nama', "%$nama%");

    return $this->db->resultSet();
  }
}
