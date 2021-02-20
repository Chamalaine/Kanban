<?php

namespace Models;


use PDO;

class Liste extends Model {
    protected $table = 'list';

    protected $id;
    protected $title;
    protected $description;
    protected $id_board;



    public function showListes($idBoard){
        $req = $this->db()->prepare("
        SELECT * FROM {$this->getTable()} 
        WHERE id_board = :idBoard
      ");

        $req->execute([
            ':idBoard' => $idBoard
        ]);

        $this->closeConnection();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addListe($title, $description, $idBoard){

        $req = $this->db()->prepare("
        INSERT INTO {$this->getTable()}
        (title, description, id_board)
        VALUES (:title, :description, :idBoard)
      ");


        $req->execute([
            ':title' => $title,
            ':description' => $description,
            ':idBoard' => $idBoard
        ]);

        $this->closeConnection();

    }

    public function deleteListe($idListe){
        $req = $this->db()->prepare("
        DELETE 
        FROM {$this->getTable()}
        WHERE id = :idListe
        ");

        $req->execute([
            ':idListe' => $idListe,
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

    /**
     * @return string
     */
    public function getIdBoard()
    {
        return $this->id_board;
    }

    /**
     * @param int $id_tableau
     */
    public function setIdBoard($id_board): void
    {
        $this->id_board = $id_board;
    }


}