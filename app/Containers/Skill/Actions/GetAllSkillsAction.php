<?php

namespace App\Containers\Skill\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllSkillsAction extends Action
{
    public function run(Request $request)
    {
        $skills = Apiato::call('Skill@GetAllSkillsTask', [], ['addRequestCriteria']);

        return $skills;
    }
}
