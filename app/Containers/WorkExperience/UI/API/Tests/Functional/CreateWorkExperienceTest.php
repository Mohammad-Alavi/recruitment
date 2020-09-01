<?php

namespace App\Containers\WorkExperience\UI\API\Tests\Functional;

use App\Containers\WorkExperience\Models\WorkExperience;
use App\Containers\WorkExperience\Tests\ApiTestCase;

/**
 * Class CreateWorkExperienceTest.
 *
 * @group work-experience
 * @group api
 */
class CreateWorkExperienceTest extends ApiTestCase
{
    protected $endpoint = 'post@v1/users/{user_id}/work-experiences';

    public function testCreateNewWorkExperienceAsAnOwner(): void
    {
        $this->getTestingUser();
        $data = [
            'user_id' => $this->testingUser->id,
            'work_place_name' => 'work name',
            'type_of_work' => 'workin like dawg',
            'work_duration_year' => 2,
            'work_duration_month' => 5,
            'insurance_duration_year' => 1,
            'insurance_duration_month' => 9,
            'activity_termination_reason' => 'resignation',
            'employer_name' => 'Fag System',
            'employer_number' => '09391079907',
        ];

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')->makeCall($data);

        $response->assertStatus(201);
        $this->assertResponseContainKeyValue([
            'object' => 'WorkExperience',
        ]);
        foreach ($data as $key => $value) {
            if ($key === 'user_id') {
                $this->assertResponseContainKeyValue([
                    $key => $this->encode($this->testingUser->id),
                ]);
                continue;
            }
            $this->assertResponseContainKeyValue([
                $key => $data[$key],
            ]);
        }
        $responseContent = $this->getResponseContentObject();
        $this->assertNotEmpty($responseContent->data);
        foreach ($data as $key => $value) {
            $this->assertDatabaseHas('work_experiences', [$key => $data[$key]]);
        }
    }
}
