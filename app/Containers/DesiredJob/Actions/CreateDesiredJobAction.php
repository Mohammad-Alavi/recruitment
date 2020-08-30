<?php

namespace App\Containers\DesiredJob\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateDesiredJobAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $desiredjob = Apiato::call('DesiredJob@CreateDesiredJobTask', [$data]);

        return $desiredjob;
    }
}
