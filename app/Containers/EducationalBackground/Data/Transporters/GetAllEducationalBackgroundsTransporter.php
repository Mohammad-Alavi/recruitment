<?php

namespace App\Containers\EducationalBackground\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class GetAllEducationalBackgroundsTransporter extends Transporter
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
