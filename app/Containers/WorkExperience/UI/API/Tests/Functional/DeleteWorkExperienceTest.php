<?php

namespace App\Containers\WorkExperience\UI\API\Tests\Functional;

use App\Containers\WorkExperience\Models\WorkExperience;
use App\Containers\WorkExperience\Tests\ApiTestCase;

/**
 * Class DeleteWorkExperienceTest.
 *
 * @group work-experience
 * @group api
 */
class DeleteWorkExperienceTest extends ApiTestCase
{
    protected $endpoint = 'delete@v1/users/{user_id}/work-experiences/{work_experience_id}';

    public function testDeleteWorkExperience(): void
    {
        $this->getTestingUser();
        $work_experience = factory(WorkExperience::class)->create(['user_id' => $this->testingUser->id]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($work_experience->id, false, '{work_experience_id}')->makeCall();

        $response->assertStatus(204);
    }
}
