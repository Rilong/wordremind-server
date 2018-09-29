<?php


use Phinx\Seed\AbstractSeed;

class SentencesSeeder extends AbstractSeed {
    public function run() {
        $sentences_json = file_get_contents(__DIR__ . '/sentences.json');
        $sentences = json_decode($sentences_json, true);
        $this->table('sentences')->insert($sentences)->save();

    }
}
