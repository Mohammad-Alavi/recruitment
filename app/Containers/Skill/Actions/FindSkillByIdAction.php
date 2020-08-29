<?php

namespace App\Containers\Skill\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Skill\Data\Transporters\FindSkillByIdTransporter;
use App\Ship\Parents\Actions\Action;

class FindSkillByIdAction extends Action
{
    public function run(FindSkillByIdTransporter $request)
    {
        return Apiato::call('Skill@FindSkillByIdTask', [$request->skill_id]);
    }
}
