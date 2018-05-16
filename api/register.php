<?php
require '../functions.php';

$user = $_POST['user'];
$response = array();

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
        exit(json_encode($response));
    }else {
        setStatus(400);
        $response = array(
            'user' => 'errorUserExists'
        );
        exit(json_encode($response));
    }
}

setStatus(400);
$response = array(
    'user' => 'error'
);
exit(json_encode($response));