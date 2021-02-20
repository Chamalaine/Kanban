<?php

namespace Models;

use PDO;
use Models\Liste;

class Board extends Model {
    protected string $table = 'board';


  protected int $id;
  protected string $title;
  protected string $description;



  // MODEL method display all boards of 1 user
  public function showBoards($user){

      $req = $this->db()->prepare("
        SELECT {$this->getTable()}.*
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

  // MODEL method display 1 board
  public function showBoard($id){

      $req = $this->db()->prepare("
        SELECT * FROM board 
        WHERE id = :id
      ");

      $req->execute([
          ':id' => $id,
      ]);

      $this->closeConnection();

      return $req->fetch(PDO::FETCH_ASSOC);

  }

  // MODEL add a board
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



      $req2 = $this->db()->prepare("
        INSERT INTO gerer
        (id_user, id_board)
        VALUES (:idUser, :idBoard)
      ");

      var_dump($user);
      var_dump($idBoard);

      $req2->execute([
          ':idBoard' => $idBoard,
          ':idUser' => $user
      ]);

      $this->closeConnection();

      return $idBoard;
  }

  // MODEL search a board with id
  public function findBoardById($id){
      $req = $this->db()->prepare("
        SELECT * 
        FROM {$this->getTable()} 
        WHERE id = :id
        ");

      $req->execute([
          ':id' => $id,
      ]);

      $this->closeConnection();

      return $req->fetch(PDO::FETCH_ASSOC);

  }

  public function deleteBoard($idBoard, $user){

      $req = $this->db()->prepare("
        DELETE 
        FROM gerer
        WHERE id_board = :idBoard
        ");

      $req->execute([
          ':idBoard' => $idBoard,
      ]);

      $req2 = $this->db()->prepare("
        DELETE  
        FROM {$this->getTable()}
        WHERE id = :idBoard
        ");

      $req2->execute([
          ':idBoard' => $idBoard,
      ]);

      $this->closeConnection();

  }

  public function addUser($idUser,$idBoard){

      $req=$this->db()->prepare("
      INSERT INTO gerer
      (id_user,id_board)
      VALUES (:idUser,:idBoard)
      ");

      $req->execute([
         ':idUser' => $idUser,
          ':idBoard' => $idBoard
      ]);

      $this->closeConnection();
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
