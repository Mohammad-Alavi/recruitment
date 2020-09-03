<?php

namespace App\Containers\HealthSelfDeclaration\UI\API\Tests\Functional;

use App\Containers\HealthSelfDeclaration\Models\HealthSelfDeclaration;
use App\Containers\HealthSelfDeclaration\Tests\ApiTestCase;

/**
 * Class UpdateHealthSelfDeclarationTest.
 *
 * @group health-self-declaration
 * @group api
 */
class UpdateHealthSelfDeclarationTest extends ApiTestCase
{
    protected $endpoint = 'patch@v1/users/{user_id}/health-self-declarations/{health_self_declaration_id}';

    protected $access = [
        'roles' => '',
        'permissions' => '',
    ];

    public function testUpdateExistingHealthSelfDeclaration(): void
    {
        $this->getTestingUser();
        $healthSelfDeclaration = factory(HealthSelfDeclaration::class)->create(['user_id' => $this->testingUser->id]);

        $data = [
            'user_id' => $this->testingUser->id,
            'health_options' => [
                [
                    'title' => 'شکستگی استخوان',
                    'answer' => 0,
                    'description' => 'پام شکست صدا سگ دادم'
                ],
                [
                    'title' => 'شکستگی باسن',
                    'answer' => 1,
                    'description' => 'جای واکسن، روی باسن'
                ],
                [
                    'title' => 'قطع شدگی بلبول',
                    'answer' => 0,
                    'description' => 'بلبول ایز نو مور'
                ]
            ],
            'blood_type' => 'A+'
        ];

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($healthSelfDeclaration->id, false, '{health_self_declaration_id}')
            ->makeCall($data);

        $response->assertStatus(200);
        $this->assertResponseContainKeyValue([
            'object' => 'HealthSelfDeclaration',
            'blood_type' => $data['blood_type'],
        ]);
    }

    public function testUpdateNonExistingHealthSelfDeclaration(): void
    {
        $this->getTestingUser();

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId(6666, false, '{health_self_declaration_id}')
            ->makeCall();

        $response->assertStatus(422);

        $this->assertResponseContainKeys([
            'errors'
        ]);
    }

    public function testUpdateExistingHealthSelfDeclarationWithInvalidValues(): void
    {
        $this->getTestingUser();
        $healthSelfDeclaration = factory(HealthSelfDeclaration::class)->create(['user_id' => $this->testingUser->id]);

        $data = [
            'blood_type' => '',
            'health_options' => '',
        ];

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($healthSelfDeclaration->id, false, '{health_self_declaration_id}')
            ->makeCall($data);

        $response->assertStatus(422);

        $this->assertValidationErrorContain([
            'blood_type' => 'The selected blood type is invalid.',
        ]);
    }
}
