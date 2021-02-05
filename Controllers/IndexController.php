<?php

namespace Controllers;

class IndexController extends Controller {

  // "Convention" Method par défaut d'appel d'un controleur
  public function index()
  {
    $this->view('index.php', [
      'test' => 'Mon texte',
      'var' => 45,
    ]);
  }
}
