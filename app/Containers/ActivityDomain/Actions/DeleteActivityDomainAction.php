<?php

namespace App\Containers\ActivityDomain\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteActivityDomainAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('ActivityDomain@DeleteActivityDomainTask', [$request->id]);
    }
}
