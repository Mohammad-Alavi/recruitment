<?php

namespace App\Containers\ActivityDomain\Tasks;

use App\Containers\ActivityDomain\Data\Repositories\ActivityDomainJobRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllActivityDomainJobsTask extends Task
{

    protected ActivityDomainJobRepository $repository;

    public function __construct(ActivityDomainJobRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->all();
    }
}
