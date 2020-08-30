<?php

namespace App\Containers\DesiredJob\UI\API\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\DesiredJob\Data\Transporters\CreateDesiredJobTransporter;
use App\Containers\DesiredJob\Data\Transporters\DeleteDesiredJobTransporter;
use App\Containers\DesiredJob\Data\Transporters\FindDesiredJobByIdTransporter;
use App\Containers\DesiredJob\Data\Transporters\GetAllDesiredJobsTransporter;
use App\Containers\DesiredJob\Data\Transporters\UpdateDesiredJobTransporter;
use App\Containers\DesiredJob\UI\API\Requests\CreateDesiredJobRequest;
use App\Containers\DesiredJob\UI\API\Requests\DeleteDesiredJobRequest;
use App\Containers\DesiredJob\UI\API\Requests\FindDesiredJobByIdRequest;
use App\Containers\DesiredJob\UI\API\Requests\GetAllDesiredJobsRequest;
use App\Containers\DesiredJob\UI\API\Requests\UpdateDesiredJobRequest;
use App\Containers\DesiredJob\UI\API\Transformers\DesiredJobTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createDesiredJob(CreateDesiredJobRequest $request): JsonResponse
    {
        $desiredJob = Apiato::call('DesiredJob@CreateDesiredJobAction', [new CreateDesiredJobTransporter($request)]);
        return $this->created($this->transform($desiredJob, DesiredJobTransformer::class));
    }

    public function findDesiredJobById(FindDesiredJobByIdRequest $request): array
    {
        $desiredJob = Apiato::call('DesiredJob@FindDesiredJobByIdAction', [new FindDesiredJobByIdTransporter($request)]);
        return $this->transform($desiredJob, DesiredJobTransformer::class);
    }

    public function getAllDesiredJobs(GetAllDesiredJobsRequest $request): array
    {
        $desiredJobs = Apiato::call('DesiredJob@GetAllDesiredJobsAction', [new GetAllDesiredJobsTransporter($request)]);
        return $this->transform($desiredJobs, DesiredJobTransformer::class);
    }

    public function updateDesiredJob(UpdateDesiredJobRequest $request): array
    {
        $desiredJob = Apiato::call('DesiredJob@UpdateDesiredJobAction', [new UpdateDesiredJobTransporter($request)]);
        return $this->transform($desiredJob, DesiredJobTransformer::class);
    }

    public function deleteDesiredJob(DeleteDesiredJobRequest $request): JsonResponse
    {
        Apiato::call('DesiredJob@DeleteDesiredJobAction', [new DeleteDesiredJobTransporter($request)]);
        return $this->noContent();
    }
}
