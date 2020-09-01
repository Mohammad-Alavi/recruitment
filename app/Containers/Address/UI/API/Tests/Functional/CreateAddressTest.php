<?php

namespace App\Containers\Address\UI\API\Tests\Functional;

use App\Containers\Address\Tests\ApiTestCase;

/**
 * Class CreateAddressTest.
 *
 * @group address
 * @group api
 */
class CreateAddressTest extends ApiTestCase
{
    protected $endpoint = 'post@v1/users/{user_id}/addresses';

    public function testCreateNewAddressAsAnOwner(): void
    {
        $this->getTestingUser();

        $data = [
            'user_id' => $this->testingUser->id,
            'address' => 'کوی گارگر',
            'province_id' => 2,
            'city_id' => 47,
        ];

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')->makeCall($data);

        // assert the response status
        $response->assertStatus(201);

        // assert returned address is the updated one
        $this->assertResponseContainKeyValue([
            'object' => 'Address',
        ]);

        foreach ($data as $key => $value) {
            if ($key === 'user_id') {
                $this->assertResponseContainKeyValue([
                    $key => $this->encode($this->testingUser->id),
                ]);
                continue;
            }
            if ($key === 'province_id' || $key === 'city_id') {
                $this->assertResponseContainKeyValue([
                    $key => $this->encode($data[$key]),
                ]);
                continue;
            }
            $this->assertResponseContainKeyValue([
                $key => $data[$key],
            ]);
        }

        $responseContent = $this->getResponseContentObject();
        $this->assertNotEmpty($responseContent->data);

        foreach ($data as $key => $value) {
            $this->assertDatabaseHas('addresses', [$key => $data[$key]]);
        }
    }

    public function testCreateNewAddressWithoutRequiredFields(): void
    {
        $this->getTestingUser();

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')->makeCall();

        $response->assertStatus(422);
        $this->assertValidationErrorContain([
            'address' => 'The address field is required.',
            'province_id' => 'The province id field is required.',
            'city_id' => 'The city id field is required.',
        ]);
    }
}
