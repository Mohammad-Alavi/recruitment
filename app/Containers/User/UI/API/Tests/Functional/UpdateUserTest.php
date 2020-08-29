<?php

namespace App\Containers\User\UI\API\Tests\Functional;

use App\Containers\User\Tests\ApiTestCase;

/**
 * Class UpdateUserTest.
 *
 * @group user
 * @group api
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UpdateUserTest extends ApiTestCase
{

    protected $endpoint = 'put@v1/users/{id}';

    protected $access = [
        'roles' => '',
        'permissions' => 'update-users',
    ];

    public function testUpdateExistingUser(): void
    {
        $user = $this->getTestingUser();

        $data = [
            'name' => 'Updated Name',
            'last_name' => 'Updated last Name',
            'birth' => '20081010',
            'gender' => 'male',
            'military_service_status' => 'done',
            'marital_status' => 'married',
            'last_educational_certificate' => 'master_degree',
            'field_of_study' => 'نرم افزار',
            'method_of_introduction' => 'social_media',
            'device' => 'samsung-z10',
            'platform' => 'mobile',
            'password' => 'updated#Password',
        ];

        $response = $this->injectId($user->id)->makeCall($data);

        $response->assertStatus(200);
        $this->assertResponseContainKeyValue([
            'object' => 'User',
            'email' => $user->email,
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'birth' => $data['birth'],
            'gender' => $data['gender'],
            'military_service_status' => $data['military_service_status'],
            'marital_status' => $data['marital_status'],
            'last_educational_certificate' => $data['last_educational_certificate'],
            'field_of_study' => $data['field_of_study'],
            'method_of_introduction' => $data['method_of_introduction'],
        ]);

        $this->assertDatabaseHas('users', ['name' => $data['name']]);
    }

    public function testUpdateNonExistingUser(): void
    {
        $data = [
            'name' => 'Updated Name',
        ];

        $fakeUserId = 7777;

        $response = $this->injectId($fakeUserId)->makeCall($data);

        $response->assertStatus(422);

        $this->assertResponseContainKeyValue([
            'message' => 'The given data was invalid.'
        ]);
    }

    public function testUpdateExistingUserWithoutData(): void
    {
        $response = $this->makeCall();

        $response->assertStatus(422);

        $this->assertResponseContainKeyValue([
            'message' => 'The given data was invalid.'
        ]);
    }

    public function testUpdateExistingUserWithEmptyValues(): void
    {
        $data = [
            'name' => '',
            'password' => '',
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(422);

        $this->assertValidationErrorContain([
            'password' => 'The password must be at least 6 characters.',
            'name' => 'The name must be at least 2 characters.',
        ]);

    }
}
