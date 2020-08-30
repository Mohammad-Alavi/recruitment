<?php

namespace App\Containers\Job\Tasks;

use App\Containers\Job\Data\Repositories\JobRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateJobTask extends Task
{

    protected $repository;

    public function __construct(JobRepository $repository)
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
