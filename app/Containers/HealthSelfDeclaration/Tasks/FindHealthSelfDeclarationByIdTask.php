<?php

namespace App\Containers\HealthSelfDeclaration\Tasks;

use App\Containers\HealthSelfDeclaration\Data\Repositories\HealthSelfDeclarationRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindHealthSelfDeclarationByIdTask extends Task
{
    protected HealthSelfDeclarationRepository $repository;

    public function __construct(HealthSelfDeclarationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        } catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
