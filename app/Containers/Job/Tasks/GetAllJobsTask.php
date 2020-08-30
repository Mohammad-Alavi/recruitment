<?php

namespace App\Containers\Job\Tasks;

use App\Containers\Job\Data\Repositories\JobRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllJobsTask extends Task
{

    protected $repository;

    public function __construct(JobRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
