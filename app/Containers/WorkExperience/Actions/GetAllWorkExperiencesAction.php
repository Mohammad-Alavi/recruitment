<?php

namespace App\Containers\WorkExperience\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllWorkExperiencesAction extends Action
{
    public function run(Request $request)
    {
        $workexperiences = Apiato::call('WorkExperience@GetAllWorkExperiencesTask', [], ['addRequestCriteria']);

        return $workexperiences;
    }
}
