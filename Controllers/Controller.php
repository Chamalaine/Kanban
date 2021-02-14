<?php

namespace Controllers;

class Controller {
  // Chemin du dossier des vues à partir de la racine
  const VIEW_PATH = '/Views/';

  // Page de redirection si non connecté
  const REDIRECT_GUEST = 'connect';

  // Page de redirection si non connecté
    const REDIRECT_USER = 'index';

  // Détermine si la session a déjà été "start"
  static protected $session = false;

  // Détermine si l'utilisateur est connecté dans la session
  // voir function isAuth() plus bas
  static protected $isAuth = null;

  // Appel et echo les données d'une vue "chargée"
  // --> $data contient les données fournies par le contrôleur
  // --> $data est un array accessible dans la vue !
  protected function view($fileName, $data = [])
  {
    $filePath = APP_BASE_PATH . self::VIEW_PATH . $fileName;

    if (file_exists($filePath)) {
      require $filePath; // Importe/Charge le code php de la vue
    }
  }

  protected function authRequired()
  {
    if ( !$this->isAuth() ) {
      header('Location: '.self::REDIRECT_GUEST);
      exit();
    }
  }

    protected function notAuth()
    {
        var_dump("hello");
        if ( $this->isAuth() ) {
            header('Location: '.self::REDIRECT_USER);
            exit();
        }
    }

  protected function isAuth()
  {
    // Détermine une premère fois dans l'instance PHP si l'utilisateur est authentifié.
    if (self::$isAuth === null) {
      // On récupère le récultat d'une condition.
      self::$isAuth = is_int($this->getCurrentUserId());
    }

    return self::$isAuth;
  }

  protected function getCurrentUserId()
  {
    return $this->session()['id'] ?? null;
  }

  // La fonction renvoie une référence à $_SESSION
  // On peut se servir d'elle un peu comme si ont utilisé $_SESSION
  protected function session()
  {
    // Activation de la session
    // + référence vers $_SESSION
    if ( !self::$session ) {
      session_start();
      self::$session = TRUE;
    }

    return $_SESSION;
  }
}
