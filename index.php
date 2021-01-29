<?php

// Autoloader de composer, fichier pour le modifier : composer.json
require'vendor/autoload.php';

$url= '';

if(isset($_GET['url'])){
    $url = explode('/', $_GET['url']);
}

if($url == ''){
    header('Location: view/home.php');
}

switch($url[0]){
    case "security":
        include("controller/SecurityController.php");
        break;
}