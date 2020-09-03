<?php

use App\Containers\HealthSelfDeclaration\Models\HealthSelfDeclaration;
use App\Containers\User\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Config;

/** @var Factory $factory */
$factory->define(HealthSelfDeclaration::class, static function (Faker $faker) {

    return [
        'health_options' => json_encode([
            [
                'title' => $faker->title,
                'answer' => $faker->boolean,
                'description' => $faker->realText()
            ],
            [
                'title' => $faker->title,
                'answer' => $faker->boolean,
                'description' => $faker->realText()
            ],
            [
                'title' => $faker->title,
                'answer' => $faker->boolean,
                'description' => $faker->realText()
            ]
        ], JSON_THROW_ON_ERROR),
        'blood_type' => $faker->randomElement(Config::get('health-self-declaration-container.available_blood_types')),
        'user_id' => static function () {
            return factory(User::class)->create()->id;
        },
    ];
});
