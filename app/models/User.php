<?php

class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function login($username, $password)
  {
    $query = "SELECT * FROM Pengguna.data_pengguna WHERE nomor_identitas = :username";

    $this->db->query($query);
    $this->db->bind(":username", $username);
    $this->db->execute();

    $user = $this->db->single();

    if ($user && $password === $user['password']) {
      return $user;
    }
    return false;
  }
}
