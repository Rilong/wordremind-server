<?php

use helpers\Config;
use helpers\Date;
use helpers\Json;
use helpers\Messages;
use helpers\Registry;
use helpers\User;
use Klein\Request;
use Klein\Response;
use \RedBeanPHP\R as R;

require_once '../vendor/autoload.php';
require_once '../functions.php';

$dbconfig = new Config('db');
R::setup($dbconfig->get('dns'), $dbconfig->get('username'), $dbconfig->get('password'));
R::freeze(true);

$router = new Klein\Klein();

$router->respond('*', function (Request $request, Response $response) use ($router) {
    $sessions = R::findAll('sessions', '`date` <= ?', array(Date::now()));
    $token = User::getTokenFromHeader($request);
    header('Content-type: application/json; charset=UTF-8');

    if ($sessions) {
        R::trashAll($sessions);
    }

    $forbidden_routes = array(
        '/api/translate',
        '/api/word',
        '/api/words'
    );

    if (in_array($request->pathname(), $forbidden_routes)) {
        $agent = $request->userAgent();
        $ip = $request->ip();
        if (!User::checkSession($token, $agent, $ip)) {
            echo Json::encode(Messages::DENIED);
            setStatus(401);
            $router->abort();
        }
        $user = User::getUserBySession($request);
        Registry::set('user', $user);
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
