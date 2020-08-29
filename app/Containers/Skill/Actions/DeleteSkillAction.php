<?php

namespace App\Containers\Skill\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Skill\Data\Transporters\DeleteSkillTransporter;
use App\Ship\Parents\Actions\Action;

class DeleteSkillAction extends Action
{
    public function run(DeleteSkillTransporter $request)
    {
        return Apiato::call('Skill@DeleteSkillTask', [$request->skill_id]);
    }
}
