<?php

namespace App\Containers\DesiredJob\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\DesiredJob\Data\Transporters\CreateDesiredJobTransporter;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Carbon;

class CreateDesiredJobAction extends Action
{
    public function run(CreateDesiredJobTransporter $request)
    {
        $request->exists('ready_date') ?
            $request->ready_date = Carbon::createFromFormat('Ymd', $request->ready_date)->toDateString() :
            $request->ready_date = null;

        $data = $request->sanitizeInput([
            'user_id',
            'activity_domain_id',
            'activity_domain_job_id',
            'ready_date',
        ]);

        return Apiato::call('DesiredJob@CreateDesiredJobTask', [$data]);
    }
}
