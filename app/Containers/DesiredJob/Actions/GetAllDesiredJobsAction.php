<?php

namespace App\Containers\DesiredJob\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllDesiredJobsAction extends Action
{
    public function run(Request $request)
    {
        $desiredjobs = Apiato::call('DesiredJob@GetAllDesiredJobsTask', [], ['addRequestCriteria']);

        return $desiredjobs;
    }
}
