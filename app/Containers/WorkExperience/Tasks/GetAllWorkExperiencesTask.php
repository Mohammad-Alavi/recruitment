<?php

namespace App\Containers\WorkExperience\Tasks;

use App\Containers\WorkExperience\Data\Repositories\WorkExperienceRepository;
use App\Ship\Criterias\Eloquent\ThisEqualThatCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllWorkExperiencesTask extends Task
{

    protected WorkExperienceRepository $repository;

    public function __construct(WorkExperienceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        $this->repository->pushCriteria(new ThisEqualThatCriteria('user_id', $id));
        return $this->repository->all();
    }
}
