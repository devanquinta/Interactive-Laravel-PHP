<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Module;

$factory->define(
    Module::class, function () {
        return [
            'name' => 'Configuração',
        ];
    });
