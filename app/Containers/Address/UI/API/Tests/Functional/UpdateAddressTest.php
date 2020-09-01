<?php

namespace App\Containers\Address\UI\API\Tests\Functional;

use App\Containers\Address\Models\Address;
use App\Containers\Address\Tests\ApiTestCase;

/**
 * Class UpdateAddressTest.
 *
 * @group address
 * @group api
 */
class UpdateAddressTest extends ApiTestCase
{
    protected $endpoint = 'patch@v1/users/{user_id}/addresses/{address_id}';

    protected $access = [
        'roles' => '',
        'permissions' => '',
    ];

    public function testUpdateExistingAddress(): void
    {
        $this->getTestingUser();
        $address = factory(Address::class)->create(['user_id' => $this->testingUser->id]);

        $data = [
            'address' => 'کوی گارگر',
            'province_id' => 2,
            'city_id' => 47,
        ];

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($address->id, false, '{address_id}')
            ->makeCall($data);

        $response->assertStatus(200);
        $this->assertResponseContainKeyValue([
            'object' => 'Address',
            'address' => $data['address'],
            'province_id' => $this->encode($data['province_id']),
            'city_id' => $this->encode($data['city_id']),
        ]);

        foreach ($data as $key => $value) {
            $this->assertDatabaseHas('addresses', [$key => $data[$key]]);
        }
    }

    public function testUpdateNonExistingAddress(): void
    {
        $this->getTestingUser();

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId(6666, false, '{address_id}')
            ->makeCall();

        $response->assertStatus(422);

        $this->assertResponseContainKeys([
            'errors'
        ]);
    }

    public function testUpdateExistingAddressWithInvalidValues(): void
    {
        $this->getTestingUser();
        $address = factory(Address::class)->create(['user_id' => $this->testingUser->id]);

        $data = [
            'address' => 'کوی',
            'province_id' => 99999,
            'city_id' => 99999,
        ];

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($address->id, false, '{address_id}')
            ->makeCall($data);

        $response->assertStatus(422);

        $this->assertValidationErrorContain([
            'address' => 'The address must be at least 5 characters.',
            'province_id' => 'The selected province id is invalid.',
            'city_id' => 'The selected city id is invalid.',
        ]);
    }
}
