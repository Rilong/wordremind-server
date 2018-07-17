<?php

use helpers\Config;
use Klein\Request;
use Klein\Response;

$router->get('/api/auth', function (Request $request, Response $response) {

    $config = new Config('jwt');
    $response->code(200);
    return $config->get('secret');
});