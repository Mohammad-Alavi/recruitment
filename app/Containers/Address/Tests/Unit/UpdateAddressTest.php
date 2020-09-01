<?php

namespace App\Containers\Address\Tests\Unit;

use App\Containers\Address\Actions\UpdateAddressAction;
use App\Containers\Address\Data\Transporters\UpdateAddressTransporter;
use App\Containers\Address\Models\Address;
use App\Containers\Address\Tests\TestCase;
use Illuminate\Support\Facades\App;

/**
 * Class UpdateAddressTest.
 *
 * @group address
 * @group unit
 */
class UpdateAddressTest extends TestCase
{
    public function testUpdateAddressTest(): void
    {
        $address = factory(Address::class)->create();

        $AddressNewData = [
            'address_id' => $address->id,
            'address' => 'کوی گارگر',
            'province_id' => 2,
            'city_id' => 46,
        ];

        $transporter = new UpdateAddressTransporter($AddressNewData);
        $action = App::make(UpdateAddressAction::class);
        $updatedAddress = $action->run($transporter);

        $this->assertEquals($AddressNewData['address_id'], $updatedAddress->id);
        $this->assertEquals($AddressNewData['address'], $updatedAddress->address);
        $this->assertEquals($AddressNewData['province_id'], $updatedAddress->province_id);
        $this->assertEquals($AddressNewData['city_id'], $updatedAddress->city_id);
    }
}
