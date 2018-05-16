<?php

    require '../vendor/autoload.php';


    $key = 'wordremind-bbb8b';

    use Google\Cloud\Translate\TranslateClient;

    putenv('GOOGLE_APPLICATION_CREDENTIALS=WordRemind-f231a871a340.json');

    $to = $_GET['to'];
    $text = $_GET['text'];

    $translate = new TranslateClient(array(
        'projectId' => $key
    ));

    $target = 'uk';
    $translation = $translate->translate($text, [
        'target' => $to
    ]);

    exit(urldecode($translation['text']));