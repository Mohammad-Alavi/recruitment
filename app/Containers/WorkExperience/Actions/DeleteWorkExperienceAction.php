<?php

namespace App\Containers\WorkExperience\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteWorkExperienceAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('WorkExperience@DeleteWorkExperienceTask', [$request->id]);
    }
}
