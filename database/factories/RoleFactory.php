<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;

$factory->define(
    Role::class, function () {
        return [
            'name' => 'User',
            'role' => 'ROLE_User',
        ];
    });

Role::create(['name' => 'Admin', 'role' => 'ROLE_ADMIN']);

Role::create(['name' => 'Root', 'role' => 'ROLE_ROOT']);