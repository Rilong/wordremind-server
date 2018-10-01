<?php

use helpers\Date;
use helpers\Registry;
use helpers\User;
use RedBeanPHP\R;

$router->get('/api/words', function ($request, $response) {
    $user = Registry::get('user');
    $words = R::getAll(wordsSQL(), array($user->id));
    if (empty($words)) {
        $response->code(400);
        return json_encode(array('error' => 'wordsEmpty'));
    }

    $data = getWordsAndSentencesTree($words);
    return json_encode($data, JSON_UNESCAPED_UNICODE);
});

$router->post('/api/word', function (\Klein\Request $request, \Klein\Response $response) {
    $user = Registry::get('user');
    $word_arr = $request->word;
    $word = $word_arr['word'];
    $sentences = $request->word['sentences'];

    if (!$word) {
        $response->code(400);
        return json_encode(array('error' => 'Error'));
    }

    $word_db = R::dispense('words');
    $word_db->word = $word['word'];
    $word_db->translation = $word['translated'];
    $word_db->created_date = Date::now();

    if ($sentences) {
        for ($i = 0; $i < count($sentences); $i++) {
            $sentences_db = R::dispense('sentences');
            $sentences_db->text = $sentences[$i]['sentence'];
            $sentences_db->translation = $sentences[$i]['translated'];
            $word_db->alias('word')->ownSentencesList[] = $sentences_db;
        }
    }

    $user->alias('user')->ownWordsList[] = $word_db;
    R::store($user);
    $words = R::getAll(wordsSQL(), array($user->id));
    return json_encode(getWordsAndSentencesTree($words), JSON_UNESCAPED_UNICODE);
});

$router->delete('/api/word', function ($request, $response) {
    $user = User::getUserBySession($request);
    $word_data = $request->data;
    $word_id = $request->id;

    R::exec('DELETE FROM `words` WHERE `id` = ?', array($word_id));
    if (isset($word_data['sentences'])) {
        R::exec('DELETE FROM `sentences` WHERE `word_id` = ?', array($word_id));
    }
    $words = R::getAll(wordsSQL(), array($user->id));
    return json_encode(getWordsAndSentencesTree($words), JSON_UNESCAPED_UNICOrDE);
});

$router->put('/api/word', function ($request, $response) {
    $user = Registry::get('user');
    parse_str(file_get_contents('php://input'), $put_vars);

    $added = null;
    $editing = $put_vars['editing'];
    $word = $editing['word'];
    $word_id = $word['id'];

    if (isset($editing['added'])) {
        $added = $editing['added'];
        unset($editing['added']);
    }

    unset($editing['word']);

    $words = R::load('words', $word_id);

    if (!empty($editing)) {
        foreach ($editing as $id => $value) {
            switch ($value['status']) {
                case 'edited' :
                    $words->alias('word')->xownSentencesList[$id]->text = $value['sentence_text'];
                    $words->alias('word')->xownSentencesList[$id]->translation = $value['sentence_translation'];
                    break;
                case 'deleted' :
                    unset($words->alias('word')->xownSentencesList[$id]);
                    break;
            }
        }
    }

    if ($added != null) {
        for ($i = 0; $i < count($added); $i++) {
            $add_sentence = R::dispense('sentences');
            $add_sentence->text = $added[$i]['sentence'];
            $add_sentence->translation = $added[$i]['translated'];
            $words->alias('word')->ownSentencesList[] = $add_sentence;
        }
    }

    if (isset($word['status']) && $word['status'] == 'edited') {
        $words->word = $word['word'];
        $words->translation = $word['word_translation'];
    }

    R::store($words);
    $words_all = R::getAll(wordsSQL(), array($user->id));

    return json_encode(getWordsAndSentencesTree($words_all), JSON_UNESCAPED_UNICODE);
});
