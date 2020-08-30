<?php

namespace App\Containers\DesiredJob\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class UpdateDesiredJobTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'desired_job_id',
            'activity_domain_id',
            'activity_domain_job_id',
            'ready_date',
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
