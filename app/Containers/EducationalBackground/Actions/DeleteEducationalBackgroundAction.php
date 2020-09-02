<?php

namespace App\Containers\EducationalBackground\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\EducationalBackground\Data\Transporters\DeleteEducationalBackgroundTransporter;
use App\Ship\Parents\Actions\Action;

class DeleteEducationalBackgroundAction extends Action
{
    public function run(DeleteEducationalBackgroundTransporter $request)
    {
        return Apiato::call('EducationalBackground@DeleteEducationalBackgroundTask', [$request->educational_background_id]);
    }
}
