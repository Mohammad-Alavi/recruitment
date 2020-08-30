<?php

namespace App\Containers\DesiredJob\UI\API\Transformers;

use App\Containers\DesiredJob\Models\DesiredJob;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer;
use League\Fractal\Resource\Item;
use Vinkla\Hashids\Facades\Hashids;

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
        'user'
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
            'user_id' => Hashids::encode($entity->user_id),
            'activity_domain_id' => Hashids::encode($entity->activity_domain_id),
            'activity_domain_job_id' => Hashids::encode($entity->activity_domain_job_id),
            'ready_date' => $entity->ready_date,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
        ];

        $response = $this->ifAdmin([
            'real_id' => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    public function includeUser(DesiredJob $desiredJob): Item
    {
        return $this->item($desiredJob->user, new UserTransformer());
    }
}
