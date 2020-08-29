<?php

namespace App\Containers\Skill\UI\API\Transformers;

use App\Containers\Skill\Models\Skill;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer;
use League\Fractal\Resource\Item;
use Vinkla\Hashids\Facades\Hashids;

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
        'user'
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
            'user_id' => Hashids::encode($entity->user_id),
            'name' => $entity->name,
            'skill_level' => $entity->skill_level,
            'from_date' => $entity->from_date,
            'to_date' => $entity->to_date,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
            'readable_created_at' => $entity->created_at === null ? '' : $entity->created_at->diffForHumans(),
            'readable_updated_at' => $entity->updated_at === null ? '' : $entity->updated_at->diffForHumans(),
        ];

        $response = $this->ifAdmin([
            'real_id' => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    public function includeUser(Skill $skill): Item
    {
        return $this->item($skill->user, new UserTransformer());
    }
}
