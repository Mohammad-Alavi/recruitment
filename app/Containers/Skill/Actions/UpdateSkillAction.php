<?php

namespace App\Containers\Skill\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateSkillAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $skill = Apiato::call('Skill@UpdateSkillTask', [$request->id, $data]);

        return $skill;
    }
}
