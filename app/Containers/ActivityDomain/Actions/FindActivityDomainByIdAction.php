<?php

namespace App\Containers\ActivityDomain\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindActivityDomainByIdAction extends Action
{
    public function run(Request $request)
    {
        $activitydomain = Apiato::call('ActivityDomain@FindActivityDomainByIdTask', [$request->id]);

        return $activitydomain;
    }
}
