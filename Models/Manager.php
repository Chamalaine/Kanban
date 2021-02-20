<?php


namespace Models;


class Manager extends Model
{
    protected  $table = 'gerer';

    protected  $id;
    protected  $id_board;
    protected  $id_user;

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
     * @return int
     */
    public function getIdBoard()
    {
        return $this->id_board;
    }

    /**
     * @param int $id_board
     */
    public function setIdBoard($id_board): void
    {
        $this->id_board = $id_board;
    }

    /**
     * @return int
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param int $id_user
     */
    public function setIdUser($id_user): void
    {
        $this->id_user = $id_user;
    }
}