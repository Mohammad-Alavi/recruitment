<?php

namespace App\Containers\HealthSelfDeclaration\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class CreateHealthSelfDeclarationTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'user_id',
            'blood_type',
            'health_options',
            // allow for undefined properties
            // 'additionalProperties' => true,
        ],
        'required' => [
            // define the properties that MUST be set
            'user_id',
            'blood_type',
            'health_options',
        ],
        'default' => [
            // provide default values for specific properties here
        ]
    ];
}
