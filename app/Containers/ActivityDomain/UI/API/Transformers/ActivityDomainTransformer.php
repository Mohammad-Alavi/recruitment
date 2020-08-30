<?php

namespace App\Containers\ActivityDomain\UI\API\Transformers;

use App\Containers\ActivityDomain\Models\ActivityDomain;
use App\Ship\Parents\Transformers\Transformer;
use League\Fractal\Resource\Collection;

class ActivityDomainTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [
        'jobs'
    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    public function transform(ActivityDomain $entity): array
    {
        $response = [
            'object' => 'ActivityDomain',
            'id' => $entity->getHashedKey(),
            'name' => $entity->name,
        ];

        $response = $this->ifAdmin([
            'real_id' => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    public function includeJobs(ActivityDomain $activityDomain): Collection
    {
        return $this->collection($activityDomain->jobs, new ActivityDomainJobTransformer());
    }
}
