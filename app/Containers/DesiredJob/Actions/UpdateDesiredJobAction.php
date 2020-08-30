<?php

namespace App\Containers\DesiredJob\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\DesiredJob\Data\Transporters\UpdateDesiredJobTransporter;
use App\Ship\Parents\Actions\Action;

class UpdateDesiredJobAction extends Action
{
    public function run(UpdateDesiredJobTransporter $request)
    {
        $data = $request->sanitizeInput([
            'activity_domain_id',
            'activity_domain_job_id',
            'ready_date',
        ]);

        return Apiato::call('DesiredJob@UpdateDesiredJobTask', [$request->desired_job_id, $data]);
    }
}
