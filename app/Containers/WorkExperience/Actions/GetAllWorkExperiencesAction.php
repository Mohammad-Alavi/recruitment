<?php

namespace App\Containers\WorkExperience\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\WorkExperience\Data\Transporters\GetAllWorkExperiencesTransporter;
use App\Ship\Parents\Actions\Action;

class GetAllWorkExperiencesAction extends Action
{
    public function run(GetAllWorkExperiencesTransporter $request)
    {
        return Apiato::call('WorkExperience@GetAllWorkExperiencesTask', [$request->user_id]);
    }
}
