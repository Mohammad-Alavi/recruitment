<?php

namespace App\Containers\HealthSelfDeclaration\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class HealthSelfDeclarationRepository
 */
class HealthSelfDeclarationRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'blood_type' => '=',
        // ...
    ];

}
