<?php

namespace App\Containers\Job\Tasks;

use App\Containers\Job\Data\Repositories\JobRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateJobTask extends Task
{

    protected $repository;

    public function __construct(JobRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
