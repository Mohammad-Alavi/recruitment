<?php

use App\Containers\DesiredJob\Models\DesiredJob;
use App\Containers\User\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Config;

/** @var Factory $factory */
$factory->define(DesiredJob::class, static function (Faker $faker) {

	return [
		'activity_domain_id' => 1,
		'activity_domain_job_id' => 3,
        'ready_date' => '20091010',
		'user_id' => static function () {
			return factory(User::class)->create()->id;
		},
	];
});
