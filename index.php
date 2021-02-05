<?php

// Autoloader de composer, fichier pour le modifier : composer.json
use Controllers\LoginController;

require'vendor/autoload.php';
// Load App
require_once 'autoloader.php';

$url= '';

if(isset($_GET['url'])){

    $url = explode('/', $_GET['url']);
}

$controllerName = ucfirst(array_shift($url)).'Controller';
$methodName = strtolower(array_shift($url));

$test = new LoginController();
var_dump($test);
var_dump($controllerName);
$controller = new $controllerName;


var_dump($controller);