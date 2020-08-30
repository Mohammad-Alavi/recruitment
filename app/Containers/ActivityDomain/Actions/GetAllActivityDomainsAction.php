<?php

namespace App\Containers\ActivityDomain\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\ActivityDomain\Data\Transporters\GetAllActivityDomainsTransporter;
use App\Ship\Parents\Actions\Action;

class GetAllActivityDomainsAction extends Action
{
    public function run(GetAllActivityDomainsTransporter $request)
    {
        return Apiato::call('ActivityDomain@GetAllActivityDomainsTask', []);
    }
}
