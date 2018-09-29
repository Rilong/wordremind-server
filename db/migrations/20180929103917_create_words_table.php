<?php


use Phinx\Migration\AbstractMigration;

class CreateWordsTable extends AbstractMigration {
    public function up() {
        $this->table('words')
            ->addColumn('user_id', 'integer', ['limit' => 11])
            ->addColumn('word', 'string', ['limit' => 20])
            ->addColumn('translation', 'string', ['limit' => 20])
            ->addColumn('created_date', 'integer', ['limit' => 254])
            ->save();

    }
    public function down() {
        $this->table('words')->drop()->save();
    }
}
