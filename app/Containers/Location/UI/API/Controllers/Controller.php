<?php

namespace App\Containers\Location\UI\API\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Location\UI\API\Requests\GetAllLocationsRequest;
use App\Containers\Location\UI\API\Transformers\GetAllLocationsTransformer;
use App\Containers\Location\UI\API\Transformers\LocationTransformer;
use App\Ship\Parents\Controllers\ApiController;

class Controller extends ApiController
{
    public function getAllLocations(GetAllLocationsRequest $request)
    {
        $locations = Apiato::call('Location@GetAllLocationsAction');
        $locationTransformer = new LocationTransformer();
        return $locationTransformer->transform($locations);
    }
}