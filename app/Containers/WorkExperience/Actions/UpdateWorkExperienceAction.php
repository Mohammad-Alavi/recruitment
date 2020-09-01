<?php

namespace App\Containers\WorkExperience\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateWorkExperienceAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $workexperience = Apiato::call('WorkExperience@UpdateWorkExperienceTask', [$request->id, $data]);

        return $workexperience;
    }
}
