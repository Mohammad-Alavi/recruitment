<?php

namespace App\Containers\ActivityDomain\Tasks;

use App\Containers\ActivityDomain\Data\Repositories\ActivityDomainRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateActivityDomainTask extends Task
{

    protected $repository;

    public function __construct(ActivityDomainRepository $repository)
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
