<?php

use App\Containers\Address\Models\Address;
use App\Containers\User\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Address::class, static function (Faker $faker) {

    return [
        'address' => $faker->streetAddress,
        'province_id' => random_int(1, 32),
        'city_id' => random_int(33, 1252),
        'user_id' => static function () {
            return factory(User::class)->create()->id;
        },
    ];
});
