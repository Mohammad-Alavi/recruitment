<?php

namespace App\Containers\ActivityDomain\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ActivityDomainRepository
 */
class ActivityDomainRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
