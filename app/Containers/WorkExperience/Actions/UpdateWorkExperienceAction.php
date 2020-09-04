<?php

namespace App\Containers\WorkExperience\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\WorkExperience\Data\Transporters\UpdateWorkExperienceTransporter;
use App\Ship\Parents\Actions\Action;

class UpdateWorkExperienceAction extends Action
{
    public function run(UpdateWorkExperienceTransporter $request)
    {
        $data = $request->sanitizeInput([
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

        return Apiato::call('WorkExperience@UpdateWorkExperienceTask', [$request->work_experience_id, $data]);
    }
}
