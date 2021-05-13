<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Resource;

$factory->define(
    Resource::class, function () {
        return [
            'module_id' => 1,
            'name' => 'Topic Index',
            'resource' => 'topics.index',
            'is_menu' => 1,
        ];
    });
