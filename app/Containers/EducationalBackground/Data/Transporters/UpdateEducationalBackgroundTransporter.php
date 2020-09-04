<?php

namespace App\Containers\EducationalBackground\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class UpdateEducationalBackgroundTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'educational_background_id',
            'field_of_study',
            'degree',
            'graduation_place',
            'grade_point_average',
            'photo',
            // allow for undefined properties
            // 'additionalProperties' => true,
        ],
        'required' => [
            // define the properties that MUST be set
            'educational_background_id'
        ],
        'default' => [
            // provide default values for specific properties here
        ]
    ];
}
