<?php

namespace App\Containers\Job\UI\API\Transformers;

use App\Containers\Job\Models\Job;
use App\Ship\Parents\Transformers\Transformer;

class JobTransformer extends Transformer
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
     * @param Job $entity
     *
     * @return array
     */
    public function transform(Job $entity)
    {
        $response = [
            'object' => 'Job',
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
