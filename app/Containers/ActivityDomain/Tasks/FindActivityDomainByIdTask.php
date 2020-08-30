<?php

namespace App\Containers\ActivityDomain\Tasks;

use App\Containers\ActivityDomain\Data\Repositories\ActivityDomainRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindActivityDomainByIdTask extends Task
{

    protected $repository;

    public function __construct(ActivityDomainRepository $repository)
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
