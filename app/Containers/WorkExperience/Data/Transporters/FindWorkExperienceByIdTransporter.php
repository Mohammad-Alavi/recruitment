<?php

namespace App\Containers\WorkExperience\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class FindWorkExperienceByIdTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'work_experience_id'
            // allow for undefined properties
            // 'additionalProperties' => true,
        ],
        'required' => [
            // define the properties that MUST be set
            'work_experience_id'
        ],
        'default' => [
            // provide default values for specific properties here
        ]
    ];
}
