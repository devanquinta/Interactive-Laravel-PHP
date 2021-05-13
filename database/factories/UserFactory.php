<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;

$factory->define(
    User::class, function () {
        return [
            'name' => 'Root',
            'email' => 'root@example.com',
            'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'password' => bcrypt('abcd1234'),
            'remember_token' => bcrypt('abcd1234'),
            'role_id' => 2,
        ];
    });
User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('abcd1234'),
            'remember_token' => bcrypt('abcd1234'),
            'role_id' => 1,

    ]);

