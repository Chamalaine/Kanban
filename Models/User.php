<?php

namespace Models;

use DateTime;
use PDO;

class User extends Model {


    protected int $id;
    protected string $email;
    protected string $password;
    protected string $pseudo;
    protected DateTime $register_date;
    protected DateTime $last_connect;
    protected bool $confirmed;

    /**
     * @return INT
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param INT $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo($pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return DateTime
     */
    public function getRegisterDate()
    {
        return $this->register_date;
    }

    /**
     * @param DateTime $register_date
     */
    public function setRegisterDate($register_date): void
    {
        $this->register_date = $register_date;
    }

    /**
     * @return DateTime
     */
    public function getLastConnect()
    {
        return $this->last_connect;
    }

    /**
     * @param DateTime $last_connect
     */
    public function setLastConnect($last_connect): void
    {
        $this->last_connect = $last_connect;
    }

    /**
     * @return bool
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * @param bool $confirmed
     */
    public function setConfirmed($confirmed): void
    {
        $this->confirmed = $confirmed;
    }
}
