<?php

namespace App\Containers\DesiredJob\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\DesiredJob\Data\Transporters\GetAllDesiredJobsTransporter;
use App\Ship\Parents\Actions\Action;

class GetAllDesiredJobsAction extends Action
{
    public function run(GetAllDesiredJobsTransporter $request)
    {
        return Apiato::call('DesiredJob@GetAllDesiredJobsTask', [$request->user_id]);
    }
}
