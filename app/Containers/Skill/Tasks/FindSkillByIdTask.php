<?php

namespace App\Containers\Skill\Tasks;

use App\Containers\Skill\Data\Repositories\SkillRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindSkillByIdTask extends Task
{

    protected $repository;

    public function __construct(SkillRepository $repository)
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
