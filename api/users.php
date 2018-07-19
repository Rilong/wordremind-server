<?php

use Firebase\JWT\JWT;
use Klein\Request;
use Klein\Response;
use Lcobucci\JWT\Builder;


$router->post('/api/user', function ($request, $response) {
    header('Content-Type: application/json');
    $user = $request->user;
    if ($user) {
        $login = htmlspecialchars($user['login']);
        $password = password_hash($user['password'], PASSWORD_BCRYPT);

        $pdo = getConnection();
        $pdo->exec("INSERT INTO `users` (`login`, `password`) VALUE ('$login', '$password')");
        $id = $pdo->lastInsertId();

        if ($id != 0) {
            $stmt = $pdo->prepare('SELECT * FROM `users` WHERE `id` = ?');
            $stmt->execute([$id]);
            $response = array(
                'user' => $stmt->fetch(PDO::FETCH_ASSOC),
            );
            return json_encode($response);
        }else {
            $response->code(400);
            $response = array(
                'user' => 'errorUserExists'
            );
            return json_encode($response);
        }
    }
    return json_encode(['user' => 'error']);
});

$router->get('/api/user', function ($request, $response) {
    $login = $request->login;
    $password = $request->password;

    if ($login && $password) {
        $pdo = getConnection();
        $statement = $pdo->prepare("SELECT * FROM `users` WHERE `login` = ?");
        $statement->execute([$login]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                return json_encode($user);
            }
            else {
                $response->code(400);
                return json_encode(['error' => 'Login or password is wrong']);
            }
        }else {
            $response->code(400);
            return json_encode(['error' => 'Login or password is wrong']);
        }
    }

    $response->code(400);
    return json_encode(['error' => 'Server error']);

});

$router->get('/api/token', function (Request $request, Response $response) {
    $payload = [
//        'ial' => time(),
//        'exp' => time() + 30,
        'login' => 'admin'
    ];
    $token = JWT::encode($payload, md5('secret'));

    return $token;
});