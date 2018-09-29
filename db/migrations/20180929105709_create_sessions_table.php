<?php


use Phinx\Migration\AbstractMigration;

class CreateSessionsTable extends AbstractMigration {
    public function up() {
        $this->table('sessions')
            ->addColumn('token', 'string')
            ->addColumn('ip', 'string')
            ->addColumn('user_id', 'integer', ['limit' => 11])
            ->addColumn('date', 'integer', ['limit' => 11])
            ->addColumn('agent', 'string')
            ->save();
    }

    public function down() {
        $this->table('sessions')->drop()->save();
    }
}
