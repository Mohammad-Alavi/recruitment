<?php

namespace App\Containers\DesiredJob\Tasks;

use App\Containers\DesiredJob\Data\Repositories\DesiredJobRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateDesiredJobTask extends Task
{

    protected $repository;

    public function __construct(DesiredJobRepository $repository)
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
