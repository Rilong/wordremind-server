<?php

use Firebase\JWT\ExpiredException;
use Firebase\JWT\SignatureInvalidException;
use helpers\Config;
use helpers\Date;
use helpers\Json;
use helpers\Jwt;
use Klein\Request;
use Klein\Response;

$router->get('/api/auth', function (Request $request, Response $response) {

    $config = new Config('jwt');
    $response->code(200);
    try {
        return print_r(Jwt::decode($request->token), true);
    }catch (SignatureInvalidException $e) {
        $response->code(401);
        return "SignatureInvalid";
    }catch (ExpiredException $e) {
        $response->code(401);
        return "ExpiredInvalid";
    }
});

$router->post('/api/auth', function (Request $request, Response $response) {
   $response->code(201);
    return Json::encode(Jwt::generateToken(array(
        'id' => 1
    ), Date::minute(5)));
});