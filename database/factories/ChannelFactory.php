<?php
namespace App;

/**
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */

use App\Channel;
use Illuminate\Support\Str;

$factory->define(
    Channel::class, function () {
        $name = "CURSO DE SISTEMAS DE INFORMAÇÃO"; //sentence

        return [
            'name' => $name,
            'description' => 'Descrição da disciplina',
            'slug' => Str::slug($name),

        ];
    }
);
