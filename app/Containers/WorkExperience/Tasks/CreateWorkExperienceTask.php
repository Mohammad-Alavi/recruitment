<?php

namespace App\Containers\WorkExperience\Tasks;

use App\Containers\WorkExperience\Data\Repositories\WorkExperienceRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateWorkExperienceTask extends Task
{

    protected $repository;

    public function __construct(WorkExperienceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
