<?php

namespace App\Containers\Address\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

class AddressRepository extends Repository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
