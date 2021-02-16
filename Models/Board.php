<?php

namespace Models;

use PDO;

class Board extends Model {
    protected string $table = 'board';


  protected int $id;
  protected string $title;
  protected string $description;




  public function showBoards($user){

      $req = $this->db()->prepare("
        SELECT * 
        FROM {$this->getTable()}
        INNER JOIN gerer ON  gerer.id_board = board.id
        INNER JOIN user ON gerer.id_user = :user;
      ");

      $req->execute([
          ':user' => $user,
      ]);

      $this->closeConnection();

      return $req->fetchAll(PDO::FETCH_ASSOC);
  }

  public function addBoard($title, $description, $user){

      $req = $this->db()->prepare("
        INSERT INTO {$this->getTable()}
        (title, description)
        VALUES (:title, :description)
      ");


      $req->execute([
          ':title' => $title,
          ':description' => $description
      ]);

      $idBoard = $this->db()->lastInsertId();
      $this->closeConnection();


      $req2 = $this->db()->prepare("
        INSERT INTO gerer
        (id_user, id_board)
        VALUES (:idBoard, :idUser)
      ");

      $req2->execute([
          ':idBoard' => $idBoard,
          ':idUser' => $user
      ]);

      $this->closeConnection();

      return $idBoard;
  }

  public function findBoardById($id){
      $req = $this->db()->prepare("SELECT * FROM {$this->getTable()} WHERE id = :id");

      $req->execute([
          ':id' => $id,
      ]);

      $this->closeConnection();

      return $req->fetch(PDO::FETCH_ASSOC);

  }





    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }


}
