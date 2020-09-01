<?php

namespace App\Containers\Address\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Address\Data\Transporters\UpdateAddressTransporter;
use App\Ship\Parents\Actions\Action;

class UpdateAddressAction extends Action
{
    public function run(UpdateAddressTransporter $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return Apiato::call('Address@UpdateAddressTask', [$request->address_id, $data]);
    }
}
