<?php

namespace App\Containers\Address\UI\API\Transformers;

use App\Containers\Address\Models\Address;
use App\Ship\Parents\Transformers\Transformer;

class AddressTransformer extends Transformer
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
     * @param Address $entity
     *
     * @return array
     */
    public function transform(Address $entity)
    {
        $response = [
            'object' => 'Address',
            'id' => $entity->getHashedKey(),
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
