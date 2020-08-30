<?php

namespace App\Containers\ActivityDomain\UI\API\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\ActivityDomain\Data\Transporters\GetAllActivityDomainsTransporter;
use App\Containers\ActivityDomain\UI\API\Requests\GetAllActivityDomainsRequest;
use App\Containers\ActivityDomain\UI\API\Transformers\ActivityDomainTransformer;
use App\Ship\Parents\Controllers\ApiController;

class Controller extends ApiController
{
    public function getAllActivityDomains(GetAllActivityDomainsRequest $request): array
    {
        $activityDomains = Apiato::call('ActivityDomain@GetAllActivityDomainsAction', [new GetAllActivityDomainsTransporter($request)]);
        return $this->transform($activityDomains, ActivityDomainTransformer::class);
    }
}
