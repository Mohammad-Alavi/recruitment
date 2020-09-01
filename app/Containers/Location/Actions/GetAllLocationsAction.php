<?php

namespace App\Containers\Location\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class GetAllLocationsAction extends Action
{
    public function run()
    {
         return Apiato::call('Location@GetAllLocationsTask');
    }
}
