<?php

namespace App\Containers\Skill\Tasks;

use App\Containers\Skill\Data\Repositories\SkillRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateSkillTask extends Task
{

    protected $repository;

    public function __construct(SkillRepository $repository)
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
