<?php

namespace App\Containers\DesiredJob\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\DesiredJob\Data\Transporters\DeleteDesiredJobTransporter;
use App\Ship\Parents\Actions\Action;

class DeleteDesiredJobAction extends Action
{
    public function run(DeleteDesiredJobTransporter $request)
    {
        return Apiato::call('DesiredJob@DeleteDesiredJobTask', [$request->desired_job_id]);
    }
}
