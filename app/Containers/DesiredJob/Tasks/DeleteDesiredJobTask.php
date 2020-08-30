<?php

namespace App\Containers\DesiredJob\Tasks;

use App\Containers\DesiredJob\Data\Repositories\DesiredJobRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteDesiredJobTask extends Task
{

    protected $repository;

    public function __construct(DesiredJobRepository $repository)
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
