<?php

namespace App\Containers\Country\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class CountryRepository
 */
class CountryRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => '=',
        // ...
    ];

}
