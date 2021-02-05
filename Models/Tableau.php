<?php

namespace Models;

use PDO;

class Tableau extends Model {


  public $id;
  public $user_id;
  public $title;
  public $text;

  public function userTableau($userId)
  {
    $req = $this->db()->prepare("SELECT * FROM {$this->getTable()} WHERE user_id = :user_id");
    $req->execute([
      ':user_id' => $userId,
    ]);
    $this->closeConnection();

    return $req->fetchAll(PDO::FETCH_ASSOC);
  }

  public function hydrates()
  {
    //
  }
}
