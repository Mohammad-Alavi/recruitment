<?php

namespace App\Containers\WorkExperience\UI\API\Transformers;

use App\Containers\WorkExperience\Models\WorkExperience;
use App\Ship\Parents\Transformers\Transformer;

class WorkExperienceTransformer extends Transformer
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
     * @param WorkExperience $entity
     *
     * @return array
     */
    public function transform(WorkExperience $entity)
    {
        $response = [
            'object' => 'WorkExperience',
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
