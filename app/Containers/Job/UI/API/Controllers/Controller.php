<?php

namespace App\Containers\Job\UI\API\Controllers;

use App\Containers\Job\UI\API\Requests\CreateJobRequest;
use App\Containers\Job\UI\API\Requests\DeleteJobRequest;
use App\Containers\Job\UI\API\Requests\GetAllJobsRequest;
use App\Containers\Job\UI\API\Requests\FindJobByIdRequest;
use App\Containers\Job\UI\API\Requests\UpdateJobRequest;
use App\Containers\Job\UI\API\Transformers\JobTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Job\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateJobRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createJob(CreateJobRequest $request)
    {
        $job = Apiato::call('Job@CreateJobAction', [$request]);

        return $this->created($this->transform($job, JobTransformer::class));
    }

    /**
     * @param FindJobByIdRequest $request
     * @return array
     */
    public function findJobById(FindJobByIdRequest $request)
    {
        $job = Apiato::call('Job@FindJobByIdAction', [$request]);

        return $this->transform($job, JobTransformer::class);
    }

    /**
     * @param GetAllJobsRequest $request
     * @return array
     */
    public function getAllJobs(GetAllJobsRequest $request)
    {
        $jobs = Apiato::call('Job@GetAllJobsAction', [$request]);

        return $this->transform($jobs, JobTransformer::class);
    }

    /**
     * @param UpdateJobRequest $request
     * @return array
     */
    public function updateJob(UpdateJobRequest $request)
    {
        $job = Apiato::call('Job@UpdateJobAction', [$request]);

        return $this->transform($job, JobTransformer::class);
    }

    /**
     * @param DeleteJobRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteJob(DeleteJobRequest $request)
    {
        Apiato::call('Job@DeleteJobAction', [$request]);

        return $this->noContent();
    }
}
