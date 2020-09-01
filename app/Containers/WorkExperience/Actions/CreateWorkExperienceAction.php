<?php

namespace App\Containers\WorkExperience\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateWorkExperienceAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $workexperience = Apiato::call('WorkExperience@CreateWorkExperienceTask', [$data]);

        return $workexperience;
    }
}
