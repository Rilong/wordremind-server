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
    $users = R::findAll('users');
    print_r($users);
});

$router->post('/api/auth', function (Request $request, Response $response) {
    $login = htmlentities($request->login);
    $password = htmlspecialchars($request->password);

    $user = R::findOne('users', 'login = ?', array($login));
    if (!$user) {
        $response->code(401);
        return Json::encode('User not found');
    }

    if (!Passport::verify($password, $user->password)) {
        $response->code(401);
        return Json::encode('Password invalid');
    }

    $response->code(200);
    $token = Jwt::generateToken(array(
        'user' => $user->export()
    ), Date::hour(1));

    return Json::encode(array(
        'access_token' => $token
    ));
});