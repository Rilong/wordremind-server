<?php

use helpers\Config;
use helpers\Date;
use Klein\Request;
use Klein\Response;

$router->get('/api/auth', function (Request $request, Response $response) {

    $config = new Config('jwt');
    $response->code(200);
    try {
        return print_r(\helpers\Jwt::decode($request->token), true);
    }catch (\Firebase\JWT\SignatureInvalidException $e) {
        $response->code(401);
        return "SignatureInvalid";
    }catch (\Firebase\JWT\ExpiredException $e) {
        $response->code(401);
        return "ExpiredInvalid";
    }
});

$router->post('/api/auth', function (Request $request, Response $response) {
   $response->code(201);
    return \helpers\Jwt::generateToken(array(
        'id' => 1
    ), Date::minute(5));
});