<?php

namespace App\Containers\ActivityDomain\UI\API\Transformers;

use App\Containers\ActivityDomain\Models\ActivityDomain;
use App\Ship\Parents\Transformers\Transformer;

class ActivityDomainTransformer extends Transformer
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
     * @param ActivityDomain $entity
     *
     * @return array
     */
    public function transform(ActivityDomain $entity)
    {
        $response = [
            'object' => 'ActivityDomain',
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
