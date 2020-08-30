<?php

namespace App\Containers\DesiredJob\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteDesiredJobAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('DesiredJob@DeleteDesiredJobTask', [$request->id]);
    }
}
