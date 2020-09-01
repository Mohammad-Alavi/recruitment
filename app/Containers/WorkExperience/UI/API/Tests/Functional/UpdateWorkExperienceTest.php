<?php

namespace App\Containers\WorkExperience\UI\API\Tests\Functional;

use App\Containers\WorkExperience\Models\WorkExperience;
use App\Containers\WorkExperience\Tests\ApiTestCase;

/**
 * Class UpdateWorkExperienceTest.
 *
 * @group work-experience
 * @group api
 */
class UpdateWorkExperienceTest extends ApiTestCase
{
    protected $endpoint = 'patch@v1/users/{user_id}/work-experiences/{work_experience_id}';

    protected $access = [
        'roles' => '',
        'permissions' => '',
    ];

    public function testUpdateExistingWorkExperience(): void
    {
        $this->getTestingUser();
        $work_experience = factory(WorkExperience::class)->create(['user_id' => $this->testingUser->id]);

        $data = [
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

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($work_experience->id, false, '{work_experience_id}')
            ->makeCall($data);

        $response->assertStatus(200);
        $this->assertResponseContainKeyValue([
            'object' => 'WorkExperience',
            'work_place_name' => $data['work_place_name'],
            'type_of_work' => $data['type_of_work'],
            'work_duration_year' => $data['work_duration_year'],
            'work_duration_month' => $data['work_duration_month'],
            'insurance_duration_year' => $data['insurance_duration_year'],
            'insurance_duration_month' => $data['insurance_duration_month'],
            'activity_termination_reason' => $data['activity_termination_reason'],
            'employer_name' => $data['employer_name'],
            'employer_number' => $data['employer_number'],
        ]);

        foreach ($data as $key => $value) {
            $this->assertDatabaseHas('work_experiences', [$key => $data[$key]]);
        }
    }

    public function testUpdateNonExistingWorkExperience(): void
    {
        $this->getTestingUser();

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId(6666, false, '{work_experience_id}')
            ->makeCall();

        $response->assertStatus(422);

        $this->assertResponseContainKeys([
            'errors'
        ]);
    }
}
