<?php

use helpers\Config;
use \RedBeanPHP\R as R;

require_once '../vendor/autoload.php';
require_once '../functions.php';

$dbconfig = new Config('db');
R::setup($dbconfig->get('dns'), $dbconfig->get('username'), $dbconfig->get('password'));

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