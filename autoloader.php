<?php

// Super Global
const APP_BASE_PATH = __DIR__;

// Controllers Loader
require_once 'Controllers/Controller.php';
require_once 'Controllers/IndexController.php';
require_once 'Controllers/HomeController.php';
require_once 'Controllers/LoginController.php';

// Models Loader
require_once 'Models/Model.php';
require_once 'Models/User.php';
require_once 'Models/Board.php';
require_once 'Models/Liste.php';
require_once 'Models/Card.php';
