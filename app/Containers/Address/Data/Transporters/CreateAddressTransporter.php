<?php

namespace App\Containers\Address\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class CreateAddressTransporter extends Transporter
{
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here

            // allow for undefined properties
            // 'additionalProperties' => true,
        ],
        'required'   => [
            // define the properties that MUST be set
        ],
        'default'    => [
            // provide default values for specific properties here
        ]
    ];
}
