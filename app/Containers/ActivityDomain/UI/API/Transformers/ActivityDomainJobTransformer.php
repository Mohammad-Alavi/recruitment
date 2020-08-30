<?php

namespace App\Containers\ActivityDomain\UI\API\Transformers;

use App\Containers\ActivityDomain\Models\ActivityDomain;
use App\Containers\ActivityDomain\Models\ActivityDomainJob;
use App\Ship\Parents\Transformers\Transformer;
use Vinkla\Hashids\Facades\Hashids;

class ActivityDomainJobTransformer extends Transformer
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

    public function transform(ActivityDomainJob $entity): array
    {
        $response = [
            'object' => 'ActivityDomainJob',
            'id' => $entity->getHashedKey(),
            'activity_domain_id' => Hashids::encode($entity->activity_domain_id),
            'name' => $entity->name,
        ];

        $response = $this->ifAdmin([
            'real_id' => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
