<?php

namespace App\Containers\Skill\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Skill\Data\Transporters\GetAllSkillsTransporter;
use App\Ship\Parents\Actions\Action;

class GetAllSkillsAction extends Action
{
    public function run(GetAllSkillsTransporter $request)
    {
        return Apiato::call('Skill@GetAllSkillsTask', [$request->user_id]);
    }
}
