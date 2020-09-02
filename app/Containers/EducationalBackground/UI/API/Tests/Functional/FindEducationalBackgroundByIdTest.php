<?php

namespace App\Containers\EducationalBackground\UI\API\Tests\Functional;

use App\Containers\EducationalBackground\Models\EducationalBackground;
use App\Containers\EducationalBackground\Tests\ApiTestCase;

/**
 * Class FindEducationalBackgroundByIdTest.
 *
 * @group educational-background
 * @group api
 */
class FindEducationalBackgroundByIdTest extends ApiTestCase
{
    protected $endpoint = 'get@v1/users/{user_id}/educational-backgrounds/{educational_background_id}';

    public function testFindEducationalBackground(): void
    {
        $this->getTestingUser();
        $educational_background = factory(EducationalBackground::class)->create(['user_id' => $this->testingUser->id]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($educational_background->id, false, '{educational_background_id}')
            ->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertEquals($educational_background->id, $this->decode($responseContent->data->id));
        $this->assertEquals($educational_background->field_of_study, $responseContent->data->field_of_study);
    }

    public function testFindFilteredEducationalBackgroundResponse(): void
    {
        $this->getTestingUser();
        $educational_background = factory(EducationalBackground::class)->create(['user_id' => $this->testingUser->id]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($educational_background->id, false, '{educational_background_id}')
            ->endpoint($this->endpoint . '?filter=field_of_study')
            ->makeCall();

        // assert response status is correct
        $response->assertStatus(200);

        $this->assertResponseContainKeyValue([
            'field_of_study' => $educational_background->field_of_study,
        ]);

        $response->assertJsonMissing([
            'id' => $this->encode($educational_background->id),
            'user_id' => $this->encode($educational_background->user_id),
        ]);
    }

    public function testFindEducationalBackgroundWithRelation(): void
    {
        $this->getTestingUser();
        $educational_background = factory(EducationalBackground::class)->create(['user_id' => $this->testingUser->id]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($educational_background->id, false, '{educational_background_id}')
            ->endpoint($this->endpoint . '?include=user')
            ->makeCall();

        $response->assertStatus(200);
        $this->assertResponseContainKeys([
            'user',
        ]);
        $this->assertResponseContainKeyValue([
            'field_of_study' => $educational_background->field_of_study,
        ]);
        $responseContent = $this->getResponseContentObject();
        $this->assertNotNull($responseContent->data->user);
    }
}
