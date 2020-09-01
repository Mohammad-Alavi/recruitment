<?php

namespace App\Containers\WorkExperience\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class WorkExperienceRepository
 */
class WorkExperienceRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'work_place_name' => '=',
    ];

}
