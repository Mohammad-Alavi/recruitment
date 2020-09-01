<?php

namespace App\Containers\Address\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class UpdateAddressTransporter extends Transporter
{
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'address_id',
            'address',
            'province_id',
            'city_id',
            // allow for undefined properties
            // 'additionalProperties' => true,
        ],
        'required' => [
            // define the properties that MUST be set
            'address_id'
        ],
        'default' => [
            // provide default values for specific properties here
        ]
    ];
}
