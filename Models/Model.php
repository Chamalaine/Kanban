<?php

namespace Models;

use PDO;
use PDOException;

class Model {
  protected  $db;
  protected string $table;

  public function db()
  {
    if ($this->db === null) {
      $this->openConnection();
    }

    return $this->db;
  }

  public function all()
  {
    $req = $this->db()->prepare("SELECT * FROM ".$this->getTable());
    $req->execute();
    $this->closeConnection();

    return $req->fetchAll(PDO::FETCH_ASSOC);
  }

  public function closeConnection()
  {
    $this->db = null;
  }

  public function getTable()
  {
    if ($this->table === null) {
      echo 'Error: Table is not defined !';
      exit();
    }

    return $this->table;
  }

  protected function openConnection()
  {
    $dsn = 'mysql:host=localhost;port=3306;dbname=kanlo';
    try {
      $this->db = new PDO($dsn, 'root', '');
    } catch (PDOException $e) {
      echo $e->getMessage() . '<br>';
      exit();
    }
  }
}
