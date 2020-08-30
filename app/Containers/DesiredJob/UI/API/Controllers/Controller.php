<?php

namespace App\Containers\DesiredJob\UI\API\Controllers;

use App\Containers\DesiredJob\UI\API\Requests\CreateDesiredJobRequest;
use App\Containers\DesiredJob\UI\API\Requests\DeleteDesiredJobRequest;
use App\Containers\DesiredJob\UI\API\Requests\GetAllDesiredJobsRequest;
use App\Containers\DesiredJob\UI\API\Requests\FindDesiredJobByIdRequest;
use App\Containers\DesiredJob\UI\API\Requests\UpdateDesiredJobRequest;
use App\Containers\DesiredJob\UI\API\Transformers\DesiredJobTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\DesiredJob\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateDesiredJobRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createDesiredJob(CreateDesiredJobRequest $request)
    {
        $desiredjob = Apiato::call('DesiredJob@CreateDesiredJobAction', [$request]);

        return $this->created($this->transform($desiredjob, DesiredJobTransformer::class));
    }

    /**
     * @param FindDesiredJobByIdRequest $request
     * @return array
     */
    public function findDesiredJobById(FindDesiredJobByIdRequest $request)
    {
        $desiredjob = Apiato::call('DesiredJob@FindDesiredJobByIdAction', [$request]);

        return $this->transform($desiredjob, DesiredJobTransformer::class);
    }

    /**
     * @param GetAllDesiredJobsRequest $request
     * @return array
     */
    public function getAllDesiredJobs(GetAllDesiredJobsRequest $request)
    {
        $desiredjobs = Apiato::call('DesiredJob@GetAllDesiredJobsAction', [$request]);

        return $this->transform($desiredjobs, DesiredJobTransformer::class);
    }

    /**
     * @param UpdateDesiredJobRequest $request
     * @return array
     */
    public function updateDesiredJob(UpdateDesiredJobRequest $request)
    {
        $desiredjob = Apiato::call('DesiredJob@UpdateDesiredJobAction', [$request]);

        return $this->transform($desiredjob, DesiredJobTransformer::class);
    }

    /**
     * @param DeleteDesiredJobRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteDesiredJob(DeleteDesiredJobRequest $request)
    {
        Apiato::call('DesiredJob@DeleteDesiredJobAction', [$request]);

        return $this->noContent();
    }
}
