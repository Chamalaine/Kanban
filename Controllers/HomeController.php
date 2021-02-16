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
      if(session_status() === PHP_SESSION_ACTIVE ) {

          if ($_SESSION["id"] === $userId) {

              $board = new Board();

              $boards = $board->showBoards($userId);

              $this->view('dashboard.php', [
                  'boards' => $boards,
              ]);
          } else {
              $this->view('landing.php');
          }
      }

      else{
          $this->view('landing.php');
      }


  }

    // Create Board from Dashboard en redirect to the created board panel
    public function addBoard(){
        session_start();
        if(session_status() === PHP_SESSION_ACTIVE ) {


            if(isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["id"])){

                if($_POST["id"]===$_SESSION["id"]){

                    $board = new Board();
                    $idBoard = $board->addBoard($_POST["title"], $_POST["description"], $_POST["id"]);

                    $newBoard = $board->findBoardById($idBoard);

                    $this->view("board.php", [
                        "board" => $newBoard
                    ]);
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
