<?php

namespace App\Containers\Skill\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class FindSkillByIdTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'skill_id'
            // allow for undefined properties
            // 'additionalProperties' => true,
        ],
        'required'   => [
            // define the properties that MUST be set
            'skill_id'
        ],
        'default'    => [
            // provide default values for specific properties here
        ]
    ];
}
