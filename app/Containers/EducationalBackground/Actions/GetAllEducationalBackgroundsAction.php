<?php

namespace App\Containers\EducationalBackground\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\EducationalBackground\Data\Transporters\GetAllEducationalBackgroundsTransporter;
use App\Ship\Parents\Actions\Action;

class GetAllEducationalBackgroundsAction extends Action
{
    public function run(GetAllEducationalBackgroundsTransporter $request)
    {
        return Apiato::call('EducationalBackground@GetAllEducationalBackgroundsTask', [$request->user_id]);
    }
}
