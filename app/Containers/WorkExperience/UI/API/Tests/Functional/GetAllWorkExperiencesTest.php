<?php

namespace App\Containers\WorkExperience\UI\API\Tests\Functional;

use App\Containers\WorkExperience\Models\WorkExperience;
use App\Containers\WorkExperience\Tests\ApiTestCase;

/**
 * Class GetAllWorkExperiencesTest.
 *
 * @group work-experience
 * @group api
 */
class GetAllWorkExperiencesTest extends ApiTestCase
{
    protected $endpoint = 'get@v1/users/{user_id}/work-experiences';

    public function testGetAllWorkExperiencesByOwner(): void
    {
        $this->getTestingUser();
        $work_experiences = factory(WorkExperience::class, 4)->create(['user_id' => $this->testingUser->id]);
        factory(WorkExperience::class, 4)->create();

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();
        $this->assertCount(4, $responseContent->data);
        foreach ($work_experiences as $work_experience) {
            $this->assertEquals($this->testingUser->id, $work_experience->user_id);
        }
    }

    public function testSearchWorkExperiencesByWorkPlaceName(): void
    {
        $this->getTestingUser();
        factory(WorkExperience::class, 4)->create(['user_id' => $this->testingUser->id]);
        $work_experience = factory(WorkExperience::class)->create([
            'user_id' => $this->testingUser->id,
            'work_place_name' => 'Cafe Hantoosh'
        ]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->endpoint($this->endpoint . '?search=work_place_name:Cafe+Hantoosh')
            ->makeCall();

        $response->assertStatus(200);
        $responseArray = $response->decodeResponseJson();
        $this->assertEquals($work_experience->work_place_name, $responseArray['data'][0]['work_place_name']);
        $this->assertCount(1, $responseArray['data']);
    }
}
