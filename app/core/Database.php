<?php

class Database
{
  private $host;
  private $db_name;

  private $dbh; //  menyimpan objek PDO yang akan digunakan untuk berinteraksi dengan database.
  private $stmt; // menyimpan pernyataan (statement) SQL yang akan dieksekusi nantinya.

  public function __construct()
  {
    $this->host = env("DB_HOST");
    $this->db_name = env("DB_NAME");
    $user = null;
    $pass = null;
    // dsn (data source name)
    $dsn = 'sqlsrv:server=' . $this->host . ';database=' . $this->db_name; // menentukan tipe database (sqlsrv untuk SQL Server), alamat server, dan nama database.

    try {
      $this->dbh = new PDO($dsn, $user, $pass); // membuat objek PDO
      $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // memastikan bahwa jika terjadi kesalahan pada query SQL, kesalahan akan dilemparkan dalam bentuk exception.
    } catch (PDOException $e) {
      echo "Connection error: " . $e->getMessage();
    }

    return $this->dbh;
  }

  public function query($query)
  {
    $this->stmt = $this->dbh->prepare($query);
  }
  // prepare() digunakan untuk menyiapkan query SQL sebelum dieksekusi. Manfaat utamanya adalah memungkinkan Anda untuk menggunakan bound parameters, yang membantu mencegah SQL injection. 

  public function bind($param, $value, $type)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
          break;
      }
    }
    $this->stmt->bindValue($param, $value, $type);
    // bindValue() is a PDO function to binds a value to a corresponding named or question mark placeholder in the SQL statement that was used to prepare the statement.
  }

  public function execute()
  {
    $this->stmt->execute(); // Executes a prepared statement
  }

  // mendapatkan semua isi tabel
  public function resultSet()
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    // fetchAll() -> Fetches the remaining rows from a result set
    // PDO::FETCH_ASSOC -> returns an array indexed by column name as returned in your result set
  }

  // mendapatkan satu data dari tabel
  public function single()
  {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
    // fetch() -> Fetches the next row from a result set
  }

  public function rowCount()
  {
    return $this->stmt->rowCount();
    // rowCount() -> returns the number of rows affected by the last DELETE, INSERT, or UPDATE statement executed by the corresponding PDOStatement object.
  }
}
