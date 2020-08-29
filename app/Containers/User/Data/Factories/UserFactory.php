<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(App\Containers\User\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    $countryId = $faker->numberBetween(1, 200);

    return [
        'name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'country_id' => $countryId,
        'national_code' => $countryId === 1 ? 1810090998 : null,
        'foreign_national_code' => $countryId === 1 ? null : $faker->shuffleString("1234567891234"),
        'password' => $password ?: $password = Hash::make('testing-password'),
        'remember_token' => Str::random(10),
        'is_client' => false,
    ];
});

$factory->state(App\Containers\User\Models\User::class, 'client', function (Faker\Generator $faker) {
    return [
        'is_client' => true,
    ];
});
