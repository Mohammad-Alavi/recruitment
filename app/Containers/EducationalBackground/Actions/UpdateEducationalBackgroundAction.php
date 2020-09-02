<?php

namespace App\Containers\EducationalBackground\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\EducationalBackground\Data\Transporters\UpdateEducationalBackgroundTransporter;
use App\Ship\Parents\Actions\Action;

class UpdateEducationalBackgroundAction extends Action
{
    public function run(UpdateEducationalBackgroundTransporter $request)
    {
        $data = $request->sanitizeInput([
            'field_of_study',
            'degree',
            'graduation_place',
            'grade_point_average',
        ]);

        return Apiato::call('EducationalBackground@UpdateEducationalBackgroundTask', [$request->educational_background_id, $data]);
    }
}
