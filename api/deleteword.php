<?php
    require '../functions.php';

    $pdo = getConnection();

    $word_data = $_POST['data'];
    $word_id = $_POST['id'];
    $user_id = $word_data['user_id'];

    $statement_word = $pdo->prepare('DELETE FROM `words` WHERE `id` = ?');
    $statement_word->execute(array($word_id));


    if (isset($word_data['sentences'])) {
        $statement_sentence = $pdo->prepare('DELETE FROM `sentences` WHERE `word_id` = ?');
        $statement_sentence->execute(array($word_id));
    }

    $words = getWords($user_id, $pdo);
    exit(json_encode(getWordsAndSentencesTree($words)));