<?php

$router->get('/api/words', function ($request, $response) {
    header('Content-Type: application/json');
    $pdo = getConnection();
    $user_id = $request->userId;

    $data = getWords($user_id, $pdo, $request->settings);

    if (empty($data)) {
        $response->code(400);
        return json_encode(['error' => 'wordsEmpty']);
    }

    $data = getWordsAndSentencesTree($data);
    return json_encode($data, JSON_UNESCAPED_UNICODE);
});

$router->post('/api/word', function ($request, $response) {
    header('Content-Type: application/json');

    $word = $request->word;
    if (!$word) {
        $response->code(400);
        return json_encode(['error' => 'Error']);
    }

    $pdo = getConnection();

    $statement_words = $pdo->prepare("INSERT INTO `words` (`user_id`, `word`, `translation`, `created_date`) VALUES (?,?,?,?)");
    $params = array($word['userId'], $word['word']['word'], $word['word']['translated'], time());
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
    return json_encode(getWordsAndSentencesTree($data), JSON_UNESCAPED_UNICODE);
});

$router->delete('/api/word', function ($request, $response) {
    $pdo = getConnection();

    $word_data = $request->data;
    $word_id = $request->id;
    $user_id = $word_data['user_id'];

    $statement_word = $pdo->prepare('DELETE FROM `words` WHERE `id` = ?');
    $statement_word->execute(array($word_id));


    if (isset($word_data['sentences'])) {
        $statement_sentence = $pdo->prepare('DELETE FROM `sentences` WHERE `word_id` = ?');
        $statement_sentence->execute(array($word_id));
    }

    $words = getWords($user_id, $pdo);
    return json_encode(getWordsAndSentencesTree($words));
});

$router->put('/api/word', function ($request, $response) {
    header('Content-Type: application/json');

    parse_str(file_get_contents('php://input'), $put_vars);
    $pdo = getConnection();

    $added = null;
    $editing = $put_vars['editing'];
    $word = $editing['word'];
    $word_id = $word['id'];
    $user_id = $put_vars['user_id'];

    if (isset($editing['added'])) {
        $added = $editing['added'];
        unset($editing['added']);
    }

    unset($editing['word']);

    $update_word = $pdo->prepare('UPDATE `words` SET `word` = ?, `translation` = ? WHERE id = ?');
    $update_sentence = $pdo->prepare('UPDATE `sentences` SET `text` = ?, `translation` = ? WHERE id = ?');
    $delete_sentence = $pdo->prepare('DELETE FROM `sentences` WHERE `id` = ?');
    $add_sentence = $pdo->prepare("INSERT INTO `sentences` (`word_id`, `text`, `translation`) VALUES (?,?,?)");

    if (!empty($editing)) {
        foreach ($editing as $id => $value) {
            switch ($value['status']) {
                case 'edited' :
                    $update_sentence->execute(
                        array(
                            $value['sentence_text'],
                            $value['sentence_translation'],
                            $value['sentence_id']
                        )
                    );
                    break;
                case 'deleted' :
                    $delete_sentence->execute(array($value['sentence_id']));
                    break;
            }
        }
    }
    if ($added != null) {
        foreach ($added as $sentence) {
            $add_sentence->execute(array(
                $word_id,
                $sentence['sentence'],
                $sentence['translated']
            ));
        }
    }

    if ($word['status'] == 'edited') {
        $update_word->execute(array(
            $word['word'],
            $word['word_translation'],
            $word['id']
        ));
    }

    $words = getWords($user_id, $pdo);

    return json_encode(getWordsAndSentencesTree($words), JSON_UNESCAPED_UNICODE);
});