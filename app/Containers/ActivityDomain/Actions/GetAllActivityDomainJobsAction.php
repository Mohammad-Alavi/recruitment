<?php

namespace App\Containers\ActivityDomain\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\ActivityDomain\Data\Transporters\GetAllActivityDomainJobsTransporter;
use App\Ship\Parents\Actions\Action;

class GetAllActivityDomainJobsAction extends Action
{
    public function run(GetAllActivityDomainJobsTransporter $request)
    {
        return Apiato::call('ActivityDomain@GetAllActivityDomainJobsTask', []);
    }
}
