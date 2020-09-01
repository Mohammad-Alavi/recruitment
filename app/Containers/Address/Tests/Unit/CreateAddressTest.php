<?php

namespace App\Containers\Address\Tests\Unit;

use App\Containers\Address\Actions\CreateAddressAction;
use App\Containers\Address\Data\Transporters\CreateAddressTransporter;
use App\Containers\Address\Models\Address;
use App\Containers\Address\Tests\TestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\App;

/**
 * Class CreateAddressTest.
 *
 * @group address
 * @group unit
 */
class CreateAddressTest extends TestCase
{
    public function testCreateAddress(): void
    {
        $this->getTestingUser();
        $data = [
            'user_id' => $this->testingUser->id,
            'address' => 'کوی گارگر',
            'province_id' => 2,
            'city_id' => 46,
        ];

        $transporter = new CreateAddressTransporter($data);
        $action = App::make(CreateAddressAction::class);
        $Address = $action->run($transporter);

        // assert the returned object is an instance of the Address
        $this->assertInstanceOf(Address::class, $Address);
        // assert fields are equal
        foreach ($data as $key => $value) {
            $this->assertEquals($Address->$key, $data[$key]);
        }

        // assert relation with Owner exist
        $this->assertTrue($Address->user()->exists());
    }

    public function testThrowExceptionIfFailedToCreateAddress(): void
    {
        $this->expectException(CreateResourceFailedException::class);

        $this->getTestingUser();
        $data = [
            'user_id' => 7777,
            'address' => 'کوی گارگر',
            'province_id' => 2,
            'city_id' => 46,
        ];

        $transporter = new CreateAddressTransporter($data);
        $action = App::make(CreateAddressAction::class);
        $action->run($transporter);
    }
}
