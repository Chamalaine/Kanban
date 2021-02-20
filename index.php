<?php

// Autoloader de composer, fichier pour le modifier : composer.json
use Controllers\SecurityController;

require'vendor/autoload.php';
// Load App
require_once 'autoloader.php';

$url= '';

$http ='http://' . $_SERVER["HTTP_HOST"];

var_dump($http);

if(isset($_GET['url']) && !empty($_GET['url'])){

    // Explosion of the URL
    $url = explode('/', $_GET['url']);


    $controllerName = "Controllers\\".ucfirst(array_shift($url)).'Controller';

    $methodName = strtolower(array_shift($url));
    $param=strtolower(array_shift($url));

    $controller = new $controllerName;
    if($param!=null){
        $controller->$methodName($param);
    }

    else{
        $controller->$methodName();
    }

}

else{
    header("Location: Views/landing.php");
}
