<?php

namespace App\Containers\EducationalBackground\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class CreateEducationalBackgroundTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'user_id',
            'field_of_study',
            'degree',
            'graduation_place',
            'grade_point_average',
            // allow for undefined properties
            // 'additionalProperties' => true,
        ],
        'required' => [
            // define the properties that MUST be set
            'user_id',
            'field_of_study',
            'degree',
            'graduation_place',
            'grade_point_average',
        ],
        'default' => [
            // provide default values for specific properties here
        ]
    ];
}
