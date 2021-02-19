<?php

namespace Controllers;

class Controller {
  // Chemin du dossier des vues à partir de la racine
  const VIEW_PATH = '/Views/';

  // Page de redirection si non connecté
  const REDIRECT_GUEST = 'connect';

  // Page de redirection si non connecté
    const REDIRECT_USER = 'index';


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


}
