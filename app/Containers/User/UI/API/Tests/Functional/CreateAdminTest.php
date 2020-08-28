<?php

namespace App\Containers\User\UI\API\Tests\Functional;

use App\Containers\User\Models\User;
use App\Containers\User\Tests\ApiTestCase;

/**
 * Class CreateAdminTest.
 *
 * @group user
 * @group api
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class CreateAdminTest extends ApiTestCase
{

    protected $endpoint = 'post@v1/admins';

    protected $access = [
        'permissions' => 'create-admins',
        'roles'       => '',
    ];

    public function testCreateAdmin(): void
    {
        $data = [
            'email'    => 'apiato@admin.test',
            'country_id'     => 1,
            'national_code'     => "1810090997",
            'password' => 'secret',
        ];

        $response = $this->makeCall($data);
        $response->assertStatus(200);

        $this->assertResponseContainKeyValue([
            'email' => $data['email'],
            'country_id'  => $data['country_id'],
            'national_code'  => $data['national_code'],
        ]);
        $this->assertResponseContainKeys(['id']);
        $this->assertDatabaseHas('users', ['email' => $data['email']]);
        $user = User::where(['email' => $data['email']])->first();
        $this->assertEquals(false, $user->is_client);
    }

}
