<?php

require_once '../vendor/autoload.php';
require_once '../functions.php';

$router = new Klein\Klein();

// Translate API
require "./translate.php";
// User
require "./users.php";
// Words
require './words.php';

$router->dispatch();