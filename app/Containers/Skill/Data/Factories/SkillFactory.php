<?php

use App\Containers\Skill\Models\Skill;
use App\Containers\User\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Config;

/** @var Factory $factory */
$factory->define(Skill::class, function (Faker $faker) {

	return [
		'name' => $faker->word,
        'skill_level' => $faker->randomElement(Config::get('skill-container.skill_levels')),
        'from_date' => '20080909',
        'to_date' => '20091010',
		'user_id' => static function () {
			return factory(User::class)->create()->id;
		},
	];
});
