<?php

namespace App\Containers\Job\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class JobRepository
 */
class JobRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
