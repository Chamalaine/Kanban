<?php

namespace Controllers;

use Models\Board;

class HomeController extends Controller {

  public function __construct()
  {
    // Vérifie si l'utilisateur est connecté sinon redirection
    $this->authRequired();
  }

  // "Convention" Method par défaut d'appel d'un controleur
  public function index()
  {
    $board = new Board();
    $boards = $board->userBoard($this->getCurrentUserId());

    $this->view('home.php', [
      'boards' => $boards,
    ]);
  }

}
