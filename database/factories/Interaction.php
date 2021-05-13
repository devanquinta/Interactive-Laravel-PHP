<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Interaction;

$factory->define(
    Interaction::class, function () {
        return [
            'topic_id' => 1,
            'user_id' => 1,
            'interaction' => 'Graduação em Sistema de Informação',
        ];
    });
