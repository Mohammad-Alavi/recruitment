<?php

namespace App\Containers\WorkExperience\Tasks;

use App\Containers\WorkExperience\Data\Repositories\WorkExperienceRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindWorkExperienceByIdTask extends Task
{

    protected $repository;

    public function __construct(WorkExperienceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
