<?php

namespace App\Containers\HealthSelfDeclaration\Tasks;

use App\Containers\HealthSelfDeclaration\Data\Repositories\HealthSelfDeclarationRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateHealthSelfDeclarationTask extends Task
{
    protected HealthSelfDeclarationRepository $repository;

    public function __construct(HealthSelfDeclarationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        } catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
