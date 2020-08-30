<?php

namespace App\Containers\ActivityDomain\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllActivityDomainsAction extends Action
{
    public function run(Request $request)
    {
        $activitydomains = Apiato::call('ActivityDomain@GetAllActivityDomainsTask', [], ['addRequestCriteria']);

        return $activitydomains;
    }
}
