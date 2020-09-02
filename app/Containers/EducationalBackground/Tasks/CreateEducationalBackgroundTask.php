<?php

namespace App\Containers\EducationalBackground\Tasks;

use App\Containers\EducationalBackground\Data\Repositories\EducationalBackgroundRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateEducationalBackgroundTask extends Task
{

    protected EducationalBackgroundRepository $repository;

    public function __construct(EducationalBackgroundRepository $repository)
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
