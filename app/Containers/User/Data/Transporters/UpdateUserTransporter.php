<?php

namespace App\Containers\User\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class UpdateUserTransporter extends Transporter
{

	/**
	 * @var array
	 */
	protected $schema = [
		'type' => 'object',
		'properties' => [
			// enter all properties here
			'id',
			'name',
			'last_name',
			'password',
			'gender',
			'birth',
            'marital_status',
            'military_service_status',
            'last_educational_certificate',
            'field_of_study',
            'method_of_introduction',
			'device',
			'platform',
			// allow for undefined properties
			// 'additionalProperties' => true,
		],
		'required' => [
			// define the properties that MUST be set
			'id',
		],
		'default' => [
			// provide default values for specific properties here
		]
	];
}
