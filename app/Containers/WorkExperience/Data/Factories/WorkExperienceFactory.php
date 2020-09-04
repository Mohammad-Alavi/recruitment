<?php

use App\Containers\User\Models\User;
use App\Containers\WorkExperience\Models\WorkExperience;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Config;

/** @var Factory $factory */
$factory->define(WorkExperience::class, static function (Faker $faker) {

	return [
        'activity_termination_reason' => $faker->randomElement(Config::get('work-experience-container.available_activity_termination_reason')),
        'work_place_name' => $faker->word,
        'consent_text' => $faker->realText(),
        'type_of_work' => $faker->word,
        'work_duration_year' => random_int(0,40),
        'work_duration_month' => random_int(0,12),
        'insurance_duration_year' => random_int(0,30),
        'insurance_duration_month' => random_int(0,12),
        'employer_name' => $faker->word,
        'employer_number' => $faker->shuffleString('09391079907'),
		'user_id' => static function () {
			return factory(User::class)->create()->id;
		},
	];
});
