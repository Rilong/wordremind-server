<?php


use Phinx\Seed\AbstractSeed;

class UsersSeeder extends AbstractSeed
{
    public function run() {
        $users_json = file_get_contents(__DIR__ . '/users.json');
        $users = json_decode($users_json, true);
        $this->table('users')->insert($users)->save();
    }
}
