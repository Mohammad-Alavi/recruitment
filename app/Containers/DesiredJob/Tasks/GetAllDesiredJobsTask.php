<?php

namespace App\Containers\DesiredJob\Tasks;

use App\Containers\DesiredJob\Data\Repositories\DesiredJobRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllDesiredJobsTask extends Task
{

    protected $repository;

    public function __construct(DesiredJobRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
