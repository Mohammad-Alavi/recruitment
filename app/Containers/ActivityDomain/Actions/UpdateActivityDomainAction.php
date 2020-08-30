<?php

namespace App\Containers\ActivityDomain\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateActivityDomainAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $activitydomain = Apiato::call('ActivityDomain@UpdateActivityDomainTask', [$request->id, $data]);

        return $activitydomain;
    }
}
