<?php

namespace App\Containers\Skill\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class CreateSkillTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'user_id',
            'name',
            'skill_level',
            'from_date',
            'to_date',
            // allow for undefined properties
            // 'additionalProperties' => true,
        ],
        'required' => [
            'user_id',
            'name',
            'skill_level',
            'from_date',
            'to_date',
            // define the properties that MUST be set
        ],
        'default' => [
            // provide default values for specific properties here
        ]
    ];
}
