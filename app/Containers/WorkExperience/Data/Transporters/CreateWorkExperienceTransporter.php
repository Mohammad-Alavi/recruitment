<?php

namespace App\Containers\WorkExperience\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class CreateWorkExperienceTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'user_id',
            'work_place_name',
            'type_of_work',
            'work_duration_year',
            'work_duration_month',
            'insurance_duration_year',
            'insurance_duration_month',
            'activity_termination_reason',
            'employer_name',
            'employer_number',
            'consent_photo',
            'consent_text',
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
