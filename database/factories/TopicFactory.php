<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Channel;
use App\Topic;
use App\User;
use Illuminate\Support\Str;

$factory->define(Topic::class, function () {
    $title = 'SISTEMAS DE INFORMAÇÃO';
    // $body = $faker->paragraph(2);
    return [
        'channel_id' => function () {
            return factory(Channel::class)->create()->id;
        },
        'user_id' => function () {
            return factory(User::class)->create()->id;

        },
        'title' => $title,
        'body' => 'Tópicos de sistemas de Informação',
        'slug' => Str::slug($title),
    ];
});
