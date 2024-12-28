<?php

class Lomba extends BaseModel {
    protected $table = 'INFO_LOMBA';

    public function getAllLomba()
    {
        $query = "SELECT * FROM " . $this->table;
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getLombaById($lombaId)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE lomba_id = :lombaId";
        $this->db->query($query);
        $this->db->bind(':lombaId', $lombaId);
        return $this->db->single();
    }

    public function addLomba($data)
    {
        $lombaId = $this->generateId($this->table, 'lomba_id', 'LMB');
        $query = "INSERT INTO " . $this->table . " (lomba_id, kategori_id, nama_lomba, tingkat, deskripsi_lomba, link_lomba, deadline_lomba) 
                  VALUES (:lomba_id, :kategori_id, :nama_lomba, :tingkat, :deskripsi_lomba, :link_lomba, :deadline_lomba)";
        $this->db->query($query);
        $this->db->bind(':lomba_id', $lombaId);
        $this->db->bind(':kategori_id', $data['kategori_id']);
        $this->db->bind(':nama_lomba', $data['nama_lomba']);
        $this->db->bind(':tingkat', $data['tingkat']);
        $this->db->bind(':deskripsi_lomba', $data['deskripsi_lomba']);
        $this->db->bind(':link_lomba', $data['link_lomba']);
        $this->db->bind(':deadline_lomba', $data['deadline_lomba']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateLomba($data)
    {
        $query = "UPDATE " . $this->table . " SET kategori_id = :kategori_id, nama_lomba = :nama_lomba, tingkat = :tingkat, deskripsi_lomba = :deskripsi_lomba, link_lomba = :link_lomba, deadline_lomba = :deadline_lomba 
                  WHERE lomba_id = :lomba_id";
        $this->db->query($query);
        $this->db->bind(':kategori_id', $data['kategori_id']);
        $this->db->bind(':nama_lomba', $data['nama_lomba']);
        $this->db->bind(':tingkat', $data['tingkat']);
        $this->db->bind(':deskripsi_lomba', $data['deskripsi_lomba']);
        $this->db->bind(':link_lomba', $data['link_lomba']);
        $this->db->bind(':deadline_lomba', $data['deadline_lomba']);
        $this->db->bind(':lomba_id', $data['lomba_id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteLomba($lombaId)
    {
        $query = "DELETE FROM " . $this->table . " WHERE lomba_id = :lombaId";
        $this->db->query($query);
        $this->db->bind(':lombaId', $lombaId);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
}
