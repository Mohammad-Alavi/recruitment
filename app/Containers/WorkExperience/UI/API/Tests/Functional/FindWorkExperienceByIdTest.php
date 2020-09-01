<?php

namespace App\Containers\WorkExperience\UI\API\Tests\Functional;

use App\Containers\WorkExperience\Models\WorkExperience;
use App\Containers\WorkExperience\Tests\ApiTestCase;

/**
 * Class FindWorkExperienceByIdTest.
 *
 * @group work-experience
 * @group api
 */
class FindWorkExperienceByIdTest extends ApiTestCase
{
    protected $endpoint = 'get@v1/users/{user_id}/work-experiences/{work_experience_id}';

    public function testFindWorkExperience(): void
    {
        $this->getTestingUser();
        $work_experience = factory(WorkExperience::class)->create(['user_id' => $this->testingUser->id]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($work_experience->id, false, '{work_experience_id}')
            ->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertEquals($work_experience->id, $this->decode($responseContent->data->id));
        $this->assertEquals($work_experience->work_place_name, $responseContent->data->work_place_name);
    }

    public function testFindFilteredWorkExperienceResponse(): void
    {
        $this->getTestingUser();
        $work_experience = factory(WorkExperience::class)->create(['user_id' => $this->testingUser->id]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($work_experience->id, false, '{work_experience_id}')
            ->endpoint($this->endpoint . '?filter=work_place_name')
            ->makeCall();

        // assert response status is correct
        $response->assertStatus(200);

        $this->assertResponseContainKeyValue([
            'work_place_name' => $work_experience->work_place_name,
        ]);

        $response->assertJsonMissing([
            'id' => $this->encode($work_experience->id),
            'user_id' => $this->encode($work_experience->user_id),
        ]);
    }

    public function testFindWorkExperienceWithRelation(): void
    {
        $this->getTestingUser();
        $work_experience = factory(WorkExperience::class)->create(['user_id' => $this->testingUser->id]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($work_experience->id, false, '{work_experience_id}')
            ->endpoint($this->endpoint . '?include=user')
            ->makeCall();

        $response->assertStatus(200);
        $this->assertResponseContainKeys([
            'user',
        ]);
        $this->assertResponseContainKeyValue([
            'work_place_name' => $work_experience->work_place_name,
        ]);
        $responseContent = $this->getResponseContentObject();
        $this->assertNotNull($responseContent->data->user);
    }
}
