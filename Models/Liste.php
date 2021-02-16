<?php

namespace Models;


use PDO;

class Liste extends Model {
    protected string $table = 'list';

    protected int $id;
    protected string $title;
    protected string $description;
    protected int $id_board;

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