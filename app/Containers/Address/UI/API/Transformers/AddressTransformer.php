<?php

namespace App\Containers\Address\UI\API\Transformers;

use App\Containers\Address\Models\Address;
use App\Ship\Parents\Transformers\Transformer;
use Vinkla\Hashids\Facades\Hashids;

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

    public function transform(Address $entity): array
    {
        $response = [
            'object' => 'Address',
            'id' => $entity->getHashedKey(),
            'user_id' => Hashids::encode($entity->user_id),
            'address' => $entity->address,
            'province_id' => Hashids::encode($entity->province_id),
            'city_id' => Hashids::encode($entity->city_id),
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
        ];

        $response = $this->ifAdmin([
            'real_id' => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
