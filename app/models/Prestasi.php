<?php

class Prestasi
{
  private $table = 'prestasi';
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getAllPrestasi()
  {
    $this->db->query("SELECT * FROM " . $this->table);
    return $this->db->resultSet();
  }

  public function getPrestasiById($id)
  {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
    $this->db->bind(":id", $id);
    return $this->db->single();
  }

  public function addPrestasi($data)
  {
    $query = "INSER INTO " . $this->table . "(";
  }
}
