<?php
    require '../functions.php';

    $word = $_POST['word'];
    if (!$word) {
        setStatus(400);
        exit('Error');
    }

    $pdo = getConnection();

    $statement_words = $pdo->prepare("INSERT INTO `words` (`user_id`, `word`, `translation`) VALUES (?,?,?)");
    $params = array($word['userId'], $word['word']['word'], $word['word']['translated']);
    $statement_words->execute($params);

    $word_id = $pdo->lastInsertId();
    $sentences = $word['sentences'];

    if ($sentences) {
        $statement_sentences = $pdo->prepare("INSERT INTO `sentences` (`word_id`, `text`, `translation`) VALUES (?,?,?)");
        foreach ($sentences as $sentence) {
            $statement_sentences->execute(
                array(
                    $word_id,
                    $sentence['sentence'],
                    $sentence['translated']
                )
            );
        }
    }

    $data = getWords($word['userId'], $pdo);
    exit(json_encode(getWordsAndSentencesTree($data)));