<?php

namespace App\Containers\EducationalBackground\Tasks;

use App\Containers\EducationalBackground\Data\Repositories\EducationalBackgroundRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindEducationalBackgroundByIdTask extends Task
{

    protected EducationalBackgroundRepository $repository;

    public function __construct(EducationalBackgroundRepository $repository)
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
