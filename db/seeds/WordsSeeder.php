<?php


use Phinx\Seed\AbstractSeed;

class WordsSeeder extends AbstractSeed {
    public function run() {
        $words_json = file_get_contents(__DIR__ . '/words.json');
        $words = json_decode($words_json, true);

        $this->table('words')->insert($words)->save();
    }
}
