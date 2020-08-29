<?php

namespace App\Containers\Skill\UI\API\Transformers;

use App\Containers\Skill\Models\Skill;
use App\Ship\Parents\Transformers\Transformer;

class SkillTransformer extends Transformer
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
     * @param Skill $entity
     *
     * @return array
     */
    public function transform(Skill $entity)
    {
        $response = [
            'object' => 'Skill',
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
