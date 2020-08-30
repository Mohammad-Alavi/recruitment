<?php

namespace App\Containers\DesiredJob\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class CreateDesiredJobTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'user_id',
            'activity_domain_id',
            'activity_domain_job_id',
            'ready_date',
            // allow for undefined properties
            // 'additionalProperties' => true,
        ],
        'required' => [
            // define the properties that MUST be set
            'user_id',
            'activity_domain_id',
            'activity_domain_job_id',
            'ready_date',
        ],
        'default' => [
            // provide default values for specific properties here
        ]
    ];
}
