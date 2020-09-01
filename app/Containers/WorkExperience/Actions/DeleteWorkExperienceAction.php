<?php

namespace App\Containers\WorkExperience\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\WorkExperience\Data\Transporters\DeleteWorkExperienceTransporter;
use App\Ship\Parents\Actions\Action;

class DeleteWorkExperienceAction extends Action
{
    public function run(DeleteWorkExperienceTransporter $request)
    {
        return Apiato::call('WorkExperience@DeleteWorkExperienceTask', [$request->work_experience_id]);
    }
}
