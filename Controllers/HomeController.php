<?php

namespace Controllers;

use Models\Board;
use Models\User;

class HomeController extends Controller {


  // "Convention" Method par défaut d'appel d'un controleur
  public function index()
  {

  }


  //Display user Profile
  public function profile($userId){
        session_start();
      if($_SESSION["id"] === $userId){

          $user = new User();
          $checkUser = $user->findUserById($userId);

          $this->view('profile.php', [
              'user' => $checkUser,
          ]);
      }

      else{
          $this->view('landing.php');
      }

  }

  //Display all boards of an User
  public function dashboard($userId){
      session_start();
      if($_SESSION["id"] === $userId){

          $board = new Board();

          $boards = $board->showBoards($userId);

          $this->view('dashboard.php', [
              'boards' => $boards,
          ]);
      }

      else{
          $this->view('landing.php');
      }

  }


    public function addBoard(){
        if(session_status() === PHP_SESSION_NONE ) {

            session_start();
            if(isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["id"])){

                if($_POST["id"]===$_SESSION["id"]){

                    $board = new Board();
                    $board->addBoard($_POST["title"], $_POST["description"], $_POST["id"]);

                }

                else{
                    $this->dashboard($_SESSION["id"]);
                }
            }

            else{
                $this->dashboard($_SESSION["id"]);
            }

        }

        else{
            $this->view("connect.php");
        }
    }

}
