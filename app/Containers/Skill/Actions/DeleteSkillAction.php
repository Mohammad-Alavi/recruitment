<?php

namespace App\Containers\Skill\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteSkillAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Skill@DeleteSkillTask', [$request->id]);
    }
}
