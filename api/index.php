<?php

use Klein\Request;
use Klein\Response;

require_once '../vendor/autoload.php';
require_once '../functions.php';

$router = new Klein\Klein();

// Translate API
require "./translate.php";
// User
require "./users.php";
// Words
require './words.php';
// Auth
require './auth.php';
$router->dispatch();