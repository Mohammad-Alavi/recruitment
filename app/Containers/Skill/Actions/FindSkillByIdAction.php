<?php

namespace App\Containers\Skill\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindSkillByIdAction extends Action
{
    public function run(Request $request)
    {
        $skill = Apiato::call('Skill@FindSkillByIdTask', [$request->id]);

        return $skill;
    }
}
