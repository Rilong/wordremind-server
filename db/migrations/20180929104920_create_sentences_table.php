<?php


use Phinx\Migration\AbstractMigration;

class CreateSentencesTable extends AbstractMigration {
    public function up() {
        $this->table('sentences')
            ->addColumn('word_id', 'integer', ['limit' => 11])
            ->addColumn('text', 'text')
            ->addColumn('translation', 'text')
            ->save();

    }

    public function down() {
        $this->table('sentences')->drop()->save();
    }
}
