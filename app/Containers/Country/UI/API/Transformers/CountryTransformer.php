<?php

namespace App\Containers\Country\UI\API\Transformers;

use App\Containers\Country\Models\Country;
use App\Ship\Parents\Transformers\Transformer;

class CountryTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param Country $entity
     *
     * @return array
     */
    public function transform(Country $entity)
    {
        $response = [
            'object' => 'Country',
            'id' => $entity->getHashedKey(),
            'name' => $entity->name,
        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
