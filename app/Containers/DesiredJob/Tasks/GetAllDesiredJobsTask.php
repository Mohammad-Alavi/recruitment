<?php

namespace App\Containers\DesiredJob\Tasks;

use App\Containers\DesiredJob\Data\Repositories\DesiredJobRepository;
use App\Ship\Criterias\Eloquent\ThisEqualThatCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllDesiredJobsTask extends Task
{

    protected DesiredJobRepository $repository;

    public function __construct(DesiredJobRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        $this->repository->pushCriteria(new ThisEqualThatCriteria('user_id', $id));
        return $this->repository->all();
    }
}
