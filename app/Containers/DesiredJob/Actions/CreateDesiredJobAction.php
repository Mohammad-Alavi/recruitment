<?php

namespace App\Containers\DesiredJob\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\DesiredJob\Data\Transporters\CreateDesiredJobTransporter;
use App\Ship\Parents\Actions\Action;

class CreateDesiredJobAction extends Action
{
    public function run(CreateDesiredJobTransporter $request)
    {
        $data = $request->sanitizeInput([
            'user_id',
            'activity_domain_id',
            'activity_domain_job_id',
            'ready_date',
        ]);

        return Apiato::call('DesiredJob@CreateDesiredJobTask', [$data]);
    }
}
