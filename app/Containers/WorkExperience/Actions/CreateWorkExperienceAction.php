<?php

namespace App\Containers\WorkExperience\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\WorkExperience\Data\Transporters\CreateWorkExperienceTransporter;
use App\Ship\Parents\Actions\Action;

class CreateWorkExperienceAction extends Action
{
    public function run(CreateWorkExperienceTransporter $request)
    {
        $data = $request->sanitizeInput([
            'user_id',
            'work_place_name',
            'type_of_work',
            'work_duration_year',
            'work_duration_month',
            'insurance_duration_year',
            'insurance_duration_month',
            'activity_termination_reason',
            'employer_name',
            'employer_number',
            'consent_photo',
            'consent_text',
        ]);

        return Apiato::call('WorkExperience@CreateWorkExperienceTask', [$data]);
    }
}
