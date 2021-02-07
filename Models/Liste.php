<?php

namespace Models;


use PDO;

class Liste extends Model {
    protected string $table = 'liste';

    protected int $id;
    protected string $titre;
    protected string $description;
    protected int $id_tableau;

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
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre($titre): void
    {
        $this->titre = $titre;
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
    public function getIdTableau()
    {
        return $this->id_tableau;
    }

    /**
     * @param int $id_tableau
     */
    public function setIdTableau($id_tableau): void
    {
        $this->id_tableau = $id_tableau;
    }


}