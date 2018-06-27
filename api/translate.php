<?php

    $router->get('/api/translate', function ($request, $response) {
        header('Content-Type: application/json');
        $key = 'wordremind-bbb8b';
        putenv('GOOGLE_APPLICATION_CREDENTIALS=WordRemind-f231a871a340.json');

        $to = $request->to;
        $text = $request->text;

        $translate = new Google\Cloud\Translate\TranslateClient(array(
            'projectId' => $key
        ));

        $translation = $translate->translate($text, [
            'target' => $to
        ]);
        return json_encode($translation, JSON_UNESCAPED_UNICODE);
    });