<?php

namespace App\Containers\Country\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Country\Data\Transporters\GetAllCountriesTransporter;
use App\Ship\Parents\Actions\Action;

class GetAllCountriesAction extends Action
{
    public function run(GetAllCountriesTransporter $request)
    {
        return Apiato::call('Country@GetAllCountriesTask', []);
    }
}
