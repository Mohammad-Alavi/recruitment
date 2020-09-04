<?php

namespace App\Containers\EducationalBackground\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\EducationalBackground\Data\Transporters\CreateEducationalBackgroundTransporter;
use App\Ship\Parents\Actions\Action;

class CreateEducationalBackgroundAction extends Action
{
    public function run(CreateEducationalBackgroundTransporter $request)
    {
        $data = $request->sanitizeInput([
            'user_id',
            'field_of_study',
            'degree',
            'graduation_place',
            'grade_point_average',
            'photo',
        ]);

        return Apiato::call('EducationalBackground@CreateEducationalBackgroundTask', [$data]);
    }
}
