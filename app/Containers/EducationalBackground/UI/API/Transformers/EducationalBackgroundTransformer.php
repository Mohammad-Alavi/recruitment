<?php

namespace App\Containers\EducationalBackground\UI\API\Transformers;

use App\Containers\EducationalBackground\Models\EducationalBackground;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer;
use League\Fractal\Resource\Item;
use Vinkla\Hashids\Facades\Hashids;

class EducationalBackgroundTransformer extends Transformer
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

    public function transform(EducationalBackground $entity): array
    {
        $response = [
            'object' => 'EducationalBackground',
            'id' => $entity->getHashedKey(),
            'user_id' => Hashids::encode($entity->user_id),
            'field_of_study' => $entity->field_of_study,
            'degree' => $entity->degree,
            'graduation_place' => $entity->graduation_place,
            'grade_point_average' => $entity->grade_point_average,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
        ];

        $response = $this->ifAdmin([
            'real_id' => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    public function includeUser(EducationalBackground $educationalBackground): Item
    {
        return $this->item($educationalBackground->user, new UserTransformer());
    }
}
