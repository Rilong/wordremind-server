<?php

    require '../functions.php';

    $pdo = getConnection();
    $user_id = $_GET['userId'];

    $data = getWords($user_id, $pdo, $_GET['settings']);

    if (empty($data)) {
        setStatus(400);
        exit('wordsEmpty');
    }

    $data = getWordsAndSentencesTree($data);
    exit(json_encode($data));