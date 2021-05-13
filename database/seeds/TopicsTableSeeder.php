<?php

use App\Interaction;
use App\Module;
use App\Resource;
use App\Role;
use App\Topic;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Topic::class, 1)->create();
        factory(Role::class, 1)->create();
        factory(Resource::class, 1)->create();
        factory(Interaction::class, 1)->create();
        factory(Module::class, 1)->create();



    }
}
