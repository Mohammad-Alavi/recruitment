<?php

use App\Containers\EducationalBackground\Models\EducationalBackground;
use App\Containers\User\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Config;

/** @var Factory $factory */
$factory->define(EducationalBackground::class, static function (Faker $faker) {

    return [
        'field_of_study' => $faker->word,
        'degree' => $faker->randomElement(Config::get('educational-background-container.available_degrees')),
        'graduation_place' => $faker->streetName,
        'grade_point_average' => $faker->randomFloat(2, 0, 20),
        'user_id' => static function () {
            return factory(User::class)->create()->id;
        },
    ];
});
