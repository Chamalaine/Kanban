<?php

namespace Models;


use PDO;

class Card extends Model {
    protected string $table = 'card';

    protected int $id;
    protected string $title;
    protected string $description;
    protected int $list_id;

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