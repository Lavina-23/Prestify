<?php

class User
{
  private $table = 'pengguna';
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function login($username, $password)
  {
    $query = "SELECT * FROM " . $this->table . " WHERE username = :username";

    $this->db->query($query);
    $this->db->bind(":username", $username);
    $this->db->execute();

    $user = $this->db->single();

    if ($user && password_verify($password, $user['password'])) {
      return $user;
    }
    return false;
  }
}
