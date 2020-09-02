<?php

namespace App\Containers\EducationalBackground\Tasks;

use App\Containers\EducationalBackground\Data\Repositories\EducationalBackgroundRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateEducationalBackgroundTask extends Task
{

    protected EducationalBackgroundRepository $repository;

    public function __construct(EducationalBackgroundRepository $repository)
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
