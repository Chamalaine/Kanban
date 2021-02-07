<?php

namespace Models;


use PDO;

class Card extends Model {
    protected string $table = 'carte';

    protected int $id;
    protected string $title;
    protected string $description;
    protected int $liste_id;

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
    public function getListeId()
    {
        return $this->liste_id;
    }

    /**
     * @param int $liste_id
     */
    public function setListeId($liste_id): void
    {
        $this->liste_id = $liste_id;
    }

}