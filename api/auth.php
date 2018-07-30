<?php

use Firebase\JWT\ExpiredException;
use Firebase\JWT\SignatureInvalidException;
use helpers\Config;
use helpers\Date;
use helpers\Json;
use helpers\Jwt;
use helpers\Passport;
use Klein\Request;
use Klein\Response;
use RedBeanPHP\R;

$router->get('/api/auth', function (Request $request, Response $response) {
    // $users = R::findAll('users');
    return $request->userAgent();
});

$router->post('/api/auth', function (Request $request, Response $response) {
    $login = htmlspecialchars($request->login);
    $password = htmlspecialchars($request->password);
    $ip = $request->ip();
    $agent = sha1($request->userAgent());

    $user = R::findOne('users', 'login = ?', array($login));
    if (!$user) {
        $response->code(401);
        return Json::encode('User not found');
    }

    if (!Passport::verify($password, $user->password)) {
        $response->code(401);
        return Json::encode('Password invalid');
    }

    $session = R::findOne('sessions', '`ip` = ? AND `agent` = ?', array($ip, $agent));
    $token = null;
    if (!$session) {
        $session = R::dispense('sessions');
        $token = Passport::generateString(60);
        $session->ip = $ip;
        $session->agent = $agent;
        $session->token = $token;
        $session->user_id = $user->id;
        $session->date = Date::day(7);
        R::store($session);
    } else {
        $token = $session->token;
    }

    $response->code(200);

    return Json::encode(array(
        'access_token' => $token
    ));
});

$router->delete('/api/auth', function (Request $request, Response $response) {
    parse_str(file_get_contents('php://input'),$delete_data);

    $ip = $request->ip();
    $agent = sha1($request->userAgent());
    $session = R::findOne('sessions', '`ip` = ? AND `agent` = ?', array($ip, $agent));

    if ($session) {
        R::trash($session);
        $response->code(200);
        return Json::encode('User log outed');
    }
    $response->code(403);
    return Json::encode('Forbidden access');
});