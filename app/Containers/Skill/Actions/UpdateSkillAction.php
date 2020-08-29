<?php

namespace App\Containers\Skill\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Skill\Data\Transporters\UpdateSkillTransporter;
use App\Ship\Parents\Actions\Action;

class UpdateSkillAction extends Action
{
    public function run(UpdateSkillTransporter $request)
    {
        $data = $request->sanitizeInput([
            'name',
            'skill_level',
            'from_date',
            'to_date',
        ]);

        return Apiato::call('Skill@UpdateSkillTask', [$request->skill_id, $data]);
    }
}
