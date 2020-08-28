<?php

namespace App\Containers\User\UI\API\Tests\Functional;

use App\Containers\User\Tests\ApiTestCase;

/**
 * Class RegisterUserTest.
 *
 * @group user
 * @group api
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class RegisterUserTest extends ApiTestCase
{

    protected $endpoint = 'post@v1/register';

    protected $auth = false;

    protected $access = [
        'roles'       => '',
        'permissions' => '',
    ];

    public function testRegisterNewIranianUserWithCredentials(): void
    {
        $data = [
            'email'    => 'apiato@mail.test',
            'password' => 'secretpass',
            'country_id'     => 1,
            'national_code'     => "1810090997",
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(200);
        $this->assertResponseContainKeyValue([
            'email' => $data['email'],
            'country_id'  => $data['country_id'],
            'national_code'  => $data['national_code'],
        ]);
        $responseContent = $this->getResponseContentObject();
        $this->assertNotEmpty($responseContent->data);
        $this->assertDatabaseHas('users', ['email' => $data['email']]);
    }

    public function testRegisterNewNotIranianUserWithCredentials(): void
    {
        $data = [
            'email'    => 'apiato@mail.test',
            'password' => 'secretpass',
            'country_id'     => 2,
            'foreign_national_code'     => "1234567891234",
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(200);
        $this->assertResponseContainKeyValue([
            'email' => $data['email'],
            'country_id'  => $data['country_id'],
            'foreign_national_code'  => $data['foreign_national_code'],
        ]);
        $responseContent = $this->getResponseContentObject();
        $this->assertNotEmpty($responseContent->data);
        $this->assertDatabaseHas('users', ['email' => $data['email']]);
    }

    public function testRegisterNewUserUsingGetVerb(): void
    {
        $data = [
            'email'    => 'apiato@mail.test',
            'password' => 'secret',
            'country_id'     => 1,
        ];

        $response = $this->endpoint('get@v1/register')->makeCall($data);

        $response->assertStatus(405);

        $this->assertResponseContainKeyValue([
            'message' => 'The GET method is not supported for this route. Supported methods: POST.',
        ]);
    }

    public function testRegisterExistingUser(): void
    {
        $userDetails = [
            'email'    => 'apiato@mail.test',
            'password' => 'secret',
            'country_id'     => 1,
        ];

        $this->getTestingUser($userDetails);

        $data = [
            'email'    => $userDetails['email'],
            'password' => $userDetails['password'],
            'country_id'     => $userDetails['country_id'],
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(422);

        $this->assertValidationErrorContain([
            'email' => 'The email has already been taken.',
        ]);
    }

    public function testRegisterNewUserWithoutRequiredFields(): void
    {
        $data = [
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(422);

        $this->assertValidationErrorContain([
            'email' => 'The email field is required.',
            'password' => 'The password field is required.',
            'country_id' => 'The country id field is required.',
        ]);
    }

    public function testRegisterNewUserWithoutAtLeastOneNationalCode(): void
    {
        $data = [
            'email'    => 'apiato@mail.test',
            'password' => 'secret',
            'country_id' => 1,
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(422);

        $this->assertValidationErrorContain([
            'national_code' => 'The national code field is required when country id is 1.',
        ]);
    }

    public function testRegisterNewUserWithoutPassword()
    {
        $data = [
            'email' => 'apiato@mail.test',
            'country_id' => 1,
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(422);

        $this->assertValidationErrorContain([
            'password' => 'The password field is required.',
        ]);
    }

    public function testRegisterNewUserWithInvalidEmail(): void
    {
        $data = [
            'email'    => 'missing-at.test',
            'country_id' => 1,
            'password' => 'secret',
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(422);

        $this->assertValidationErrorContain([
            'email' => 'The email must be a valid email address.',
        ]);
    }

    public function testRegisterNewUserWithInvalidForeignNationalCode(): void
    {
        $data = [
            'email'    => 'apiato@email.com',
            'country_id' => 1,
            'password' => 'secret',
            'foreign_national_code' => 12345,
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(422);

        $this->assertValidationErrorContain([
            'foreign_national_code' => 'The foreign national code must be 13 characters.',
        ]);
    }

    public function testRegisterNewUserWithInvalidNationalCode(): void
    {
        $data = [
            'email'    => 'apiato@email.com',
            'country_id' => 1,
            'password' => 'secret',
            'national_code' => "1819990997",
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(422);

        $this->assertValidationErrorContain([
            'national_code' => 'validation.validate_national_code',
        ]);
    }
}
