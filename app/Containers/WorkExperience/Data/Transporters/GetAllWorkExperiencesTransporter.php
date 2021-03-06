<?php

namespace App\Containers\WorkExperience\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class GetAllWorkExperiencesTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'user_id'
            // allow for undefined properties
            // 'additionalProperties' => true,
        ],
        'required' => [
            // define the properties that MUST be set
            'user_id'
        ],
        'default' => [
            // provide default values for specific properties here
        ]
    ];
}
