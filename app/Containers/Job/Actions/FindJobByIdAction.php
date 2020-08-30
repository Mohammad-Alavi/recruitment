<?php

namespace App\Containers\Job\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindJobByIdAction extends Action
{
    public function run(Request $request)
    {
        $job = Apiato::call('Job@FindJobByIdTask', [$request->id]);

        return $job;
    }
}
