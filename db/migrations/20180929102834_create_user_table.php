<?php


use Phinx\Migration\AbstractMigration;

class CreateUserTable extends AbstractMigration {
    public function up() {
        $this->table('users')
            ->addColumn('login', 'string', ['limit' => 20])
            ->addColumn('password', 'string', ['limit' => 64])
            ->addColumn('settings', 'text', ['null' => true])
            ->addColumn('auth_token', 'string', ['null' => true])
            ->addIndex('login', ['unique' => true])
            ->save();
    }

    public function down() {
        $this->table('users')->drop()->save();
    }
}
