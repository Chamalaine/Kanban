<?php

// Autoloader de composer, fichier pour le modifier : composer.json
use Controllers\SecurityController;

require'vendor/autoload.php';
// Load App
require_once 'autoloader.php';

$url= '';
var_dump($_GET['url']);
if(isset($_GET['url']) && !empty($_GET['url'])){
    $url = explode('/', $_GET['url']);

    $controllerName = "Controllers\\".ucfirst(array_shift($url)).'Controller';
    $methodName = strtolower(array_shift($url));
    $controller = new $controllerName;


    $controller->$methodName();
}

else{
    header("Location: Views/landing.php");
}
