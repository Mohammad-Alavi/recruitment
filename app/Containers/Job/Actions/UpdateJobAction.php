<?php

namespace App\Containers\Job\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateJobAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $job = Apiato::call('Job@UpdateJobTask', [$request->id, $data]);

        return $job;
    }
}
