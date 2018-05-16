<?php
    require '../functions.php';

    $pdo = getConnection();

    $added = null;
    $editing = $_POST['editing'];
    $word = $editing['word'];
    $word_id = $word['id'];
    $user_id = $_POST['user_id'];

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

    exit(json_encode(getWordsAndSentencesTree($words)));