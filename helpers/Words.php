<?php
/**
 * Created by PhpStorm.
 * User: rom_g
 * Date: 01.08.2018
 * Time: 15:24
 */

namespace helpers;


class Words {
    public static function getTree($words){
        $sentances = $words->ownSentenceList;
        return $sentances;
        exit;
        foreach ($data as $value) {
            $word_id = 'id' . $value['id'];
            if (!isset($newData[$word_id])) {
                $newData[$word_id] = array(
                    'word_id' => $value['id'],
                    'user_id' => $value['user_id'],
                    'word' => $value['word'],
                    'word_translation' => $value['word_translation'],
                    'created_date' => $value['created_date']
                );
            }
            if (isset($value['sentence_text']) && $value['sentence_text'] != null) {
                $newData[$word_id]['sentences'][] = array(
                    'sentence_id' => $value['sentence_id'],
                    'sentence_text' => $value['sentence_text'],
                    'sentence_translation' => $value['sentence_translation']
                );
            }
        }
    }
}