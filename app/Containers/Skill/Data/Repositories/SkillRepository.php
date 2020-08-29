<?php

namespace App\Containers\Skill\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class SkillRepository
 */
class SkillRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
