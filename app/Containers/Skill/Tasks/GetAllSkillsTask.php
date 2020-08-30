<?php

namespace App\Containers\Skill\Tasks;

use App\Containers\Skill\Data\Repositories\SkillRepository;
use App\Ship\Criterias\Eloquent\ThisEqualThatCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllSkillsTask extends Task
{

    protected $repository;

    public function __construct(SkillRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        $this->repository->pushCriteria(new ThisEqualThatCriteria('user_id', $id));
        return $this->repository->all();
    }
}
