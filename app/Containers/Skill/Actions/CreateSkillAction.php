<?php

namespace App\Containers\Skill\Actions;

use App\Containers\Skill\Data\Transporters\CreateSkillTransporter;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateSkillAction extends Action
{
    public function run(CreateSkillTransporter $request)
    {
        $data = $request->sanitizeInput([
            'user_id',
            'name',
            'skill_level',
            'from_date',
            'to_date',
        ]);

        return Apiato::call('Skill@CreateSkillTask', [$data]);
    }
}
