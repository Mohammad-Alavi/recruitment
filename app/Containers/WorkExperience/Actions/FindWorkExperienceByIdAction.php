<?php

namespace App\Containers\WorkExperience\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindWorkExperienceByIdAction extends Action
{
    public function run(Request $request)
    {
        $workexperience = Apiato::call('WorkExperience@FindWorkExperienceByIdTask', [$request->id]);

        return $workexperience;
    }
}
