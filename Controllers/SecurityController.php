<?php

namespace Controllers;

use Models\User;

class SecurityController extends Controller {

  // "Convention" Method par défaut d'appel d'un controleur
  public function index()
  {
    $this->view('login.php', [
      'test' => 'Mon login !',
      'var' => 45,
    ]);
  }

  public function connect(){
      if(isset($_POST['email']) && isset($_POST['password'])){
        $user = new User();
        $userFind=$user->findUser($_POST['email']);

        if($userFind["password"] === $_POST['password']){

            $this->session()['id']=$userFind["id"];

            $this->view('home.php', [

            ]);
        }




      }

      else{
          $this->view('connect.php');
      }
  }
}
