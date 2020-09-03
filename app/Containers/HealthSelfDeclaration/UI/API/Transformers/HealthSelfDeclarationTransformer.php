<?php

namespace App\Containers\HealthSelfDeclaration\UI\API\Transformers;

use App\Containers\HealthSelfDeclaration\Models\HealthSelfDeclaration;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer;
use League\Fractal\Resource\Item;
use Vinkla\Hashids\Facades\Hashids;

class HealthSelfDeclarationTransformer extends Transformer
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
        'user'
    ];

    /**
     * @param HealthSelfDeclaration $entity
     *
     * @return array
     */
    public function transform(HealthSelfDeclaration $entity)
    {
        $response = [
            'object' => 'HealthSelfDeclaration',
            'id' => $entity->getHashedKey(),
            'user_id' => Hashids::encode($entity->user_id),
            'blood_type' => $entity->blood_type,
            'health_options' => json_decode($entity->health_options),
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id' => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    public function includeUser(HealthSelfDeclaration $healthSelfDeclaration): Item
    {
        return $this->item($healthSelfDeclaration->user, new UserTransformer());
    }
}
