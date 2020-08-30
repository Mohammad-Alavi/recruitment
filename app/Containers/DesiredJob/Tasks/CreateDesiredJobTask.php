<?php

namespace App\Containers\DesiredJob\Tasks;

use App\Containers\DesiredJob\Data\Repositories\DesiredJobRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateDesiredJobTask extends Task
{

    protected $repository;

    public function __construct(DesiredJobRepository $repository)
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
