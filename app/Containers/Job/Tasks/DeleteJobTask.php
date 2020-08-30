<?php

namespace App\Containers\Job\Tasks;

use App\Containers\Job\Data\Repositories\JobRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteJobTask extends Task
{

    protected $repository;

    public function __construct(JobRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
