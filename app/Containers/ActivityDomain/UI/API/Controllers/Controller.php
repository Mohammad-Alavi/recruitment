<?php

namespace App\Containers\ActivityDomain\UI\API\Controllers;

use App\Containers\ActivityDomain\UI\API\Requests\CreateActivityDomainRequest;
use App\Containers\ActivityDomain\UI\API\Requests\DeleteActivityDomainRequest;
use App\Containers\ActivityDomain\UI\API\Requests\GetAllActivityDomainsRequest;
use App\Containers\ActivityDomain\UI\API\Requests\FindActivityDomainByIdRequest;
use App\Containers\ActivityDomain\UI\API\Requests\UpdateActivityDomainRequest;
use App\Containers\ActivityDomain\UI\API\Transformers\ActivityDomainTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\ActivityDomain\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateActivityDomainRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createActivityDomain(CreateActivityDomainRequest $request)
    {
        $activitydomain = Apiato::call('ActivityDomain@CreateActivityDomainAction', [$request]);

        return $this->created($this->transform($activitydomain, ActivityDomainTransformer::class));
    }

    /**
     * @param FindActivityDomainByIdRequest $request
     * @return array
     */
    public function findActivityDomainById(FindActivityDomainByIdRequest $request)
    {
        $activitydomain = Apiato::call('ActivityDomain@FindActivityDomainByIdAction', [$request]);

        return $this->transform($activitydomain, ActivityDomainTransformer::class);
    }

    /**
     * @param GetAllActivityDomainsRequest $request
     * @return array
     */
    public function getAllActivityDomains(GetAllActivityDomainsRequest $request)
    {
        $activitydomains = Apiato::call('ActivityDomain@GetAllActivityDomainsAction', [$request]);

        return $this->transform($activitydomains, ActivityDomainTransformer::class);
    }

    /**
     * @param UpdateActivityDomainRequest $request
     * @return array
     */
    public function updateActivityDomain(UpdateActivityDomainRequest $request)
    {
        $activitydomain = Apiato::call('ActivityDomain@UpdateActivityDomainAction', [$request]);

        return $this->transform($activitydomain, ActivityDomainTransformer::class);
    }

    /**
     * @param DeleteActivityDomainRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteActivityDomain(DeleteActivityDomainRequest $request)
    {
        Apiato::call('ActivityDomain@DeleteActivityDomainAction', [$request]);

        return $this->noContent();
    }
}
