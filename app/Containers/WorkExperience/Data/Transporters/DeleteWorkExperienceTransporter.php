<?php

namespace App\Containers\WorkExperience\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class DeleteWorkExperienceTransporter extends Transporter
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
        'required'   => [
            'work_experience_id'
            // define the properties that MUST be set
        ],
        'default'    => [
            // provide default values for specific properties here
        ]
    ];
}
