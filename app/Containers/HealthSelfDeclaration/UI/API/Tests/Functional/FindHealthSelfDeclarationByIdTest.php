<?php

namespace App\Containers\HealthSelfDeclaration\UI\API\Tests\Functional;

use App\Containers\HealthSelfDeclaration\Models\HealthSelfDeclaration;
use App\Containers\HealthSelfDeclaration\Tests\ApiTestCase;

/**
 * Class FindHealthSelfDeclarationByIdTest.
 *
 * @group health-self-declaration
 * @group api
 */
class FindHealthSelfDeclarationByIdTest extends ApiTestCase
{
    protected $endpoint = 'get@v1/users/{user_id}/health-self-declarations/{health_self_declaration_id}';

    public function testFindHealthSelfDeclaration(): void
    {
        $this->getTestingUser();
        $healthSelftDeclaration = factory(HealthSelfDeclaration::class)->create(['user_id' => $this->testingUser->id]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($healthSelftDeclaration->id, false, '{health_self_declaration_id}')
            ->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertEquals($healthSelftDeclaration->id, $this->decode($responseContent->data->id));
        $this->assertEquals($healthSelftDeclaration->blood_type, $responseContent->data->blood_type);
    }

    public function testFindFilteredHealthSelfDeclarationResponse(): void
    {
        $this->getTestingUser();
        $healthSelftDeclaration = factory(HealthSelfDeclaration::class)->create(['user_id' => $this->testingUser->id]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($healthSelftDeclaration->id, false, '{health_self_declaration_id}')
            ->endpoint($this->endpoint . '?filter=blood_type')
            ->makeCall();

        // assert response status is correct
        $response->assertStatus(200);

        $this->assertResponseContainKeyValue([
            'blood_type' => $healthSelftDeclaration->blood_type,
        ]);

        $response->assertJsonMissing([
            'id' => $this->encode($healthSelftDeclaration->id),
            'user_id' => $this->encode($healthSelftDeclaration->user_id),
        ]);
    }

    public function testFindHealthSelfDeclarationWithRelation(): void
    {
        $this->getTestingUser();
        $healthSelftDeclaration = factory(HealthSelfDeclaration::class)->create(['user_id' => $this->testingUser->id]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($healthSelftDeclaration->id, false, '{health_self_declaration_id}')
            ->endpoint($this->endpoint . '?include=user')
            ->makeCall();

        $response->assertStatus(200);
        $this->assertResponseContainKeys([
            'user',
        ]);
        $this->assertResponseContainKeyValue([
            'blood_type' => $healthSelftDeclaration->blood_type,
        ]);
        $responseContent = $this->getResponseContentObject();
        $this->assertNotNull($responseContent->data->user);
    }
}
