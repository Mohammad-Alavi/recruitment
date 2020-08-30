<?php

namespace App\Containers\Job\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllJobsAction extends Action
{
    public function run(Request $request)
    {
        $jobs = Apiato::call('Job@GetAllJobsTask', [], ['addRequestCriteria']);

        return $jobs;
    }
}
