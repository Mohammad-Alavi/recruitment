<?php

namespace App\Containers\DesiredJob\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class DeleteDesiredJobTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'desired_job_id'
            // allow for undefined properties
            // 'additionalProperties' => true,
        ],
        'required' => [
            // define the properties that MUST be set
            'desired_job_id'
        ],
        'default' => [
            // provide default values for specific properties here
        ]
    ];
}
