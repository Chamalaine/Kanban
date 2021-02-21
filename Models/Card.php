<?php

namespace Models;


use PDO;

class Card extends Model {
    protected $table = 'card';


    protected $id;
    protected $title;
    protected $description;
    protected $list_id;


    public function showCards($idListe){
        $req = $this->db()->prepare("
        SELECT * FROM {$this->getTable()} 
        WHERE id_list = :idListe
      ");

        $req->execute([
            ':idListe' => $idListe
        ]);

        $this->closeConnection();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCard($title,$description,$idListe){

        $req = $this->db()->prepare("
        INSERT INTO {$this->getTable()}
        (title, description, id_list)
        VALUES (:title, :description, :idListe)
      ");


        $req->execute([
            ':title' => $title,
            ':description' => $description,
            ':idListe' => $idListe
        ]);

        $this->closeConnection();

    }

    public function deleteCard($idCard){
        $req = $this->db()->prepare("
        DELETE 
        FROM {$this->getTable()}
        WHERE id = :idCard
        ");

        $req->execute([
            ':idCard' => $idCard,
        ]);

        $this->closeConnection();
    }

    public function findCardById($idCard){
        $req = $this->db()->prepare("
        SELECT * FROM {$this->getTable()} 
        WHERE id = :idCard
      ");

        $req->execute([
            ':idCard' => $idCard
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

    /**
     * @return int
     */
    public function getListId()
    {
        return $this->list_id;
    }

    /**
     * @param int $list_id
     */
    public function setListeId($list_id): void
    {
        $this->list_id = $list_id;
    }

}