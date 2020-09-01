<?php

namespace App\Containers\WorkExperience\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\WorkExperience\Data\Transporters\FindWorkExperienceByIdTransporter;
use App\Ship\Parents\Actions\Action;

class FindWorkExperienceByIdAction extends Action
{
    public function run(FindWorkExperienceByIdTransporter $request)
    {
        return Apiato::call('WorkExperience@FindWorkExperienceByIdTask', [$request->work_experience_id]);
    }
}
