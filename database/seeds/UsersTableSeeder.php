<?php

use App\Topic;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 1)->create()->each(function ($user) { // Cria 5 Usuários
            $topic = factory(Topic::class, 1)->make(); //criar 3 topicos
            $user->topics()->saveMany($topic);
        });
    }
}
