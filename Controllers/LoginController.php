<?php

namespace Controllers;

class LoginController extends Controller {

  // "Convention" Method par défaut d'appel d'un controleur
  public function index()
  {
    $this->view('login.php', [
      'test' => 'Mon login !',
      'var' => 45,
    ]);
  }
}
