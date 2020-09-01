<?php

namespace App\Containers\Address\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class CreateAddressTransporter extends Transporter
{
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'user_id',
            'address',
            'province_id',
            'city_id',
            // allow for undefined properties
            // 'additionalProperties' => true,
        ],
        'required' => [
            // define the properties that MUST be set
            'user_id',
            'address',
            'province_id',
            'city_id',
        ],
        'default' => [
            // provide default values for specific properties here
        ]
    ];
}
