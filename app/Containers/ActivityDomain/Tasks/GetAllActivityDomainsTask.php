<?php

namespace App\Containers\ActivityDomain\Tasks;

use App\Containers\ActivityDomain\Data\Repositories\ActivityDomainRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllActivityDomainsTask extends Task
{

    protected $repository;

    public function __construct(ActivityDomainRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
