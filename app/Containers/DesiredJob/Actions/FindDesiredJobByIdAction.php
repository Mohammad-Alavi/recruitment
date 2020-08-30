<?php

namespace App\Containers\DesiredJob\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindDesiredJobByIdAction extends Action
{
    public function run(Request $request)
    {
        $desiredjob = Apiato::call('DesiredJob@FindDesiredJobByIdTask', [$request->id]);

        return $desiredjob;
    }
}
