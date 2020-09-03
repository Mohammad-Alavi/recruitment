<?php

namespace App\Containers\HealthSelfDeclaration\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class FindHealthSelfDeclarationByIdTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'health_self_declaration_id'
            // allow for undefined properties
            // 'additionalProperties' => true,
        ],
        'required' => [
            // define the properties that MUST be set
            'health_self_declaration_id'
        ],
        'default' => [
            // provide default values for specific properties here
        ]
    ];
}
