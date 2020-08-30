<?php

namespace App\Containers\DesiredJob\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class DesiredJobRepository
 */
class DesiredJobRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
