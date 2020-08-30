<?php

namespace App\Containers\ActivityDomain\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ActivityDomainJobsRepository
 */
class ActivityDomainJobRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => '=',
    ];

}
