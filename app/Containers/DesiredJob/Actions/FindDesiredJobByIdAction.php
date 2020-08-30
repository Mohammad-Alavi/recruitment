<?php

namespace App\Containers\DesiredJob\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\DesiredJob\Data\Transporters\FindDesiredJobByIdTransporter;
use App\Ship\Parents\Actions\Action;

class FindDesiredJobByIdAction extends Action
{
    public function run(FindDesiredJobByIdTransporter $request)
    {
        return Apiato::call('DesiredJob@FindDesiredJobByIdTask', [$request->desired_job_id]);
    }
}
