<?php

namespace App\Containers\EducationalBackground\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class EducationalBackgroundRepository
 */
class EducationalBackgroundRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'field_of_study' => '=',
    ];

}
