<?php

namespace Controllers;

use Models\Board;
use Models\User;

class HomeController extends Controller {


  // "Convention" Method par défaut d'appel d'un controleur
  public function index()
  {

  }

  public function profile($userId){
        session_start();
      if($_SESSION["id"] === $userId){

          $user = new User();
          $checkUser = $user->findUser($userId);

          $this->view('profile.php', [
              'user' => $checkUser,
          ]);
      }

      else{
          $this->view('landing.php');
      }

  }

}
