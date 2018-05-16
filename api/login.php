<?php

require '../functions.php';

$login = $_GET['login'];
$password = $_GET['password'];

if ($login && $password) {
    $pdo = getConnection();
    $statement = $pdo->prepare("SELECT * FROM `users` WHERE `login` = ?");
    $statement->execute([$login]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['password']))
            exit(json_encode($user));
        else {
            setStatus(400);
            exit('Login or password is wrong');
        }
    }else {
        setStatus(400);
        exit('Login or password is wrong');
    }

}

setStatus(400);
exit('Server error');

exit;