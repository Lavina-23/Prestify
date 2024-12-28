<?php

abstract class BaseModel
{
  protected $table = '';
  protected $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getAllData()
  {
    $this->db->query("SELECT * FROM " . $this->table);
    return $this->db->resultSet();
  }

  public function getDataById($colId, $id)
  {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE $colId = :id");
    $this->db->bind(":id", $id);
    return $this->db->single();
  }

  public function deleteData($colId, $id)
  {
    $query = "DELETE FROM " . $this->table . " WHERE $colId = :id";
    $this->db->query($query);

    if (is_array($id)) {
      $id = $id[0];
    }

    $this->db->bind(':id', $id);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function searchData($keyword)
  {
    $query = "SELECT * FROM " . $this->table . " WHERE nama LIKE :keyword";

    $this->db->query($query);
    $this->db->bind('keyword', "%$keyword%");

    return $this->db->resultSet();
  }

  public function generateId($table, $id, $format)
  {
    $query = "SELECT TOP 1 $id FROM $table ORDER BY $id DESC";
    $this->db->query($query);
    $lastId = $this->db->single();

    $lastId ? $newId = (int)substr($lastId[$id], 3) + 1 : $newId = 1;

    return $format . str_pad($newId, 2);
  }

  public function updateData($table, $data, $colId, $id)
  {
    $fields = [];
    $bindings = [];

    foreach ($data as $key => $value) {
      if ($value !== null) {
        $fields[] = "$key = :$key";
        $bindings[$key] = $value;
      }
    }

    $formatFields = implode(", ", $fields);

    $query = "UPDATE " . $table . " SET $formatFields WHERE $colId = :id";

    $this->db->query($query);
    foreach ($bindings as $key => $value) {
      $this->db->bind($key, $value);
    }

    $this->db->bind(":id", $id);
    $this->db->execute();
    return $this->db->rowCount();
  }
}
