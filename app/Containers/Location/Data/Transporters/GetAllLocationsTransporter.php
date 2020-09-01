<?php

namespace App\Containers\Location\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class GetAllLocationsTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'name',
            'globalCode',
            'lft',
            'rgt',
            'lvl',
            'parent',
            'published'
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
