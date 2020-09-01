<?php

namespace App\Containers\WorkExperience\Tasks;

use App\Containers\WorkExperience\Data\Repositories\WorkExperienceRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllWorkExperiencesTask extends Task
{

    protected $repository;

    public function __construct(WorkExperienceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
