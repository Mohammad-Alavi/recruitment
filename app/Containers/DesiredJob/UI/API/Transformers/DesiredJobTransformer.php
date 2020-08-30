<?php

namespace App\Containers\DesiredJob\UI\API\Transformers;

use App\Containers\DesiredJob\Models\DesiredJob;
use App\Ship\Parents\Transformers\Transformer;

class DesiredJobTransformer extends Transformer
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
     * @param DesiredJob $entity
     *
     * @return array
     */
    public function transform(DesiredJob $entity)
    {
        $response = [
            'object' => 'DesiredJob',
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
