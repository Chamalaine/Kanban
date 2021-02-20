<?php

namespace Models;

use DateTime;
use PDO;

class User extends Model {
    protected $table = 'user';

    protected $id;
    protected $email;
    protected $password;
    protected $pseudo;
    protected $register_date;
    protected $last_connect;
    protected $confirmed;
    protected $token;



    public function findUserByEmail($email){
        $req = $this->db()->prepare("SELECT * FROM {$this->getTable()} WHERE email = :email");

        $req->execute([
            ':email' => $email,
        ]);

        $this->closeConnection();

        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function findUserById($id){
        $req = $this->db()->prepare("SELECT * FROM {$this->getTable()} WHERE id = :id");
        $req->execute([
            ':id' => $id,
        ]);
        $this->closeConnection();

        return $req->fetch(PDO::FETCH_ASSOC);
    }


    public function createUser($email, $password, $pseudo){
        $req = $this->db()->prepare("INSERT INTO {$this->getTable()}
        (email, password, pseudo, register_date, last_connect, confirmed)  
        VALUES (:email, 
        :password, 
        :pseudo,
        now(),
        now(),
        1, 
        )");

        $req->execute([
            ':email' => $email,
            ':password' =>$password,
            ':pseudo' => $pseudo
        ]);

        $this->closeConnection();


    }

    public function insertToken($id, $token){

        $req = $this->db()->prepare("UPDATE {$this->getTable()} SET token = :token WHERE id = :id");
        $req->execute([
            ':token' => $token,
            ':id' => $id,
        ]);

        $this->closeConnection();
    }

    public function findToken($token){

        $req = $this->db()->prepare("SELECT * FROM {$this->getTable()} WHERE token = :token");
        $req->execute([
            ':token' => $token,
        ]);
        $this->closeConnection();

        return $req->fetch(PDO::FETCH_ASSOC);

    }

    public function changePassword($id, $password){
        $req = $this->db()->prepare("UPDATE {$this->getTable()} SET password = :password WHERE id = :id");
        $req->execute([
            ':password' => $password,
            ':id' => $id,
        ]);

        $this->closeConnection();
    }


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

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }
}
