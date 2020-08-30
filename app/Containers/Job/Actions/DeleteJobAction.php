<?php

namespace App\Containers\Job\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteJobAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Job@DeleteJobTask', [$request->id]);
    }
}
