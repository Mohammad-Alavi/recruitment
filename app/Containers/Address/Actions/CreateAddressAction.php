<?php

namespace App\Containers\Address\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Address\Data\Transporters\CreateAddressTransporter;
use App\Ship\Parents\Actions\Action;

class CreateAddressAction extends Action
{
    public function run(CreateAddressTransporter $request)
    {
        $data = $request->sanitizeInput([
            'user_id',
            'address',
            'province_id',
            'city_id',
        ]);

        return Apiato::call('Address@CreateAddressTask', [$request->user_id, $data]);
    }
}
