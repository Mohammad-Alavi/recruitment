<?php

namespace App\Containers\EducationalBackground\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\EducationalBackground\Data\Transporters\FindEducationalBackgroundByIdTransporter;
use App\Ship\Parents\Actions\Action;

class FindEducationalBackgroundByIdAction extends Action
{
    public function run(FindEducationalBackgroundByIdTransporter $request)
    {
        return Apiato::call('EducationalBackground@FindEducationalBackgroundByIdTask', [$request->educational_background_id]);
    }
}
