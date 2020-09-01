<?php

namespace App\Containers\WorkExperience\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class UpdateWorkExperienceTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'work_experience_id',
            'work_place_name',
            'type_of_work',
            'work_duration_year',
            'work_duration_month',
            'insurance_duration_year',
            'insurance_duration_month',
            'activity_termination_reason',
            'employer_name',
            'employer_number',
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
