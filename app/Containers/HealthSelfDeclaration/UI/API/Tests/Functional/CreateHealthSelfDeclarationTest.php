<?php

namespace App\Containers\HealthSelfDeclaration\UI\API\Tests\Functional;

use App\Containers\HealthSelfDeclaration\Tests\ApiTestCase;

/**
 * Class CreateHealthSelfDeclarationTest.
 *
 * @group health-self-declaration
 * @group api
 */
class CreateHealthSelfDeclarationTest extends ApiTestCase
{
    protected $endpoint = 'post@v1/users/{user_id}/health-self-declarations';

    public function testCreateNewHealthSelfDeclarationAsAnOwner(): void
    {
        $this->getTestingUser();

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

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')->makeCall($data);

        $response->assertStatus(201);
        $this->assertResponseContainKeyValue([
            'object' => 'HealthSelfDeclaration',
        ]);

        foreach ($data as $key => $value) {
            if ($key === 'user_id') {
                $this->assertResponseContainKeyValue([
                    $key => $this->encode($this->testingUser->id),
                ]);
                continue;
            }
            if ($key === 'health_options') {
                continue;
            }
            $this->assertResponseContainKeyValue([
                $key => $data[$key],
            ]);
        }

        $responseContent = $this->getResponseContentObject();
        $this->assertNotEmpty($responseContent->data);
    }

    public function testCreateNewHealthSelfDeclarationWithoutRequiredFields(): void
    {
        $this->getTestingUser();

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')->makeCall();

        $response->assertStatus(422);
        $this->assertValidationErrorContain([
            'health_options' => 'The health options field is required.',
            'blood_type' => 'The blood type field is required.',
        ]);
    }
}
