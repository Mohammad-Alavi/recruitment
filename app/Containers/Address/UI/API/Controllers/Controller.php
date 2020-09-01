<?php

namespace App\Containers\Address\UI\API\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Address\Data\Transporters\CreateAddressTransporter;
use App\Containers\Address\Data\Transporters\UpdateAddressTransporter;
use App\Containers\Address\UI\API\Requests\CreateAddressRequest;
use App\Containers\Address\UI\API\Requests\UpdateAddressRequest;
use App\Containers\Address\UI\API\Transformers\AddressTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createAddress(CreateAddressRequest $request): JsonResponse
    {
        $address = Apiato::call('Address@CreateAddressAction', [new CreateAddressTransporter($request)]);
        return $this->created($this->transform($address, AddressTransformer::class));
    }

    public function updateAddress(UpdateAddressRequest $request): array
    {
        $address = Apiato::call('Address@UpdateAddressAction', [new UpdateAddressTransporter($request)]);
        return $this->transform($address, AddressTransformer::class);
    }
}
