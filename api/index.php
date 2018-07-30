<?php

use helpers\Config;
use helpers\Date;
use Klein\Request;
use Klein\Response;
use \RedBeanPHP\R as R;

require_once '../vendor/autoload.php';
require_once '../functions.php';

$dbconfig = new Config('db');
R::setup($dbconfig->get('dns'), $dbconfig->get('username'), $dbconfig->get('password'));

$router = new Klein\Klein();

$router->respond('*', function (Request $request, Response $response) use ($router) {
    $sessions = R::findAll('sessions', '`date` <= ?', array(Date::now()));
    if ($sessions) {
        R::trashAll($sessions);
    }

    $forbidden_routes = array(
        '/api/translate',
        '/api/word',
        '/api/words'
    );

    if (in_array($request->pathname(), $forbidden_routes)) {
        echo \helpers\Json::encode('Access forbidden');
        $router->abort(401);
    }
});

// Translate API
require "./translate.php";
// User
require "./users.php";
// Words
require './words.php';
// Auth
require './auth.php';
$router->dispatch();