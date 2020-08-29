<?php

namespace App\Containers\Country\UI\API\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Country\UI\API\Requests\GetAllCountriesRequest;
use App\Containers\Country\UI\API\Transformers\CountryTransformer;
use App\Ship\Parents\Controllers\ApiController;

class Controller extends ApiController
{
    public function getAllCountries(GetAllCountriesRequest $request): array
    {
        $countries = Apiato::call('Country@GetAllCountriesAction', [$request]);
        return $this->transform($countries, CountryTransformer::class);
    }
}
