<?php

namespace App\Containers\DesiredJob\UI\API\Tests\Functional;

use App\Containers\DesiredJob\Tests\ApiTestCase;

/**
 * Class CreateDesiredJobTest.
 *
 * @group desired-job
 * @group api
 */
class CreateDesiredJobTest extends ApiTestCase
{
    protected $endpoint = 'post@v1/users/{user_id}/desired-jobs';

    public function testCreateNewDesiredJobAsAnOwner(): void
    {
        $this->getTestingUser();

        $data = [
            'user_id' => $this->testingUser->id,
            'activity_domain_id' => 1,
            'activity_domain_job_id' => 1,
            'ready_date' => '20070505',
        ];

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')->makeCall($data);

        $response->assertStatus(201);

        $this->assertResponseContainKeyValue([
            'object' => 'DesiredJob',
        ]);

        foreach ($data as $key => $value) {
            if ($key === 'user_id') {
                $this->assertResponseContainKeyValue([
                    $key => $this->encode($this->testingUser->id),
                ]);
                continue;
            }
            if ($key === 'activity_domain_id' || $key === 'activity_domain_job_id') {
                $this->assertResponseContainKeyValue([
                    $key => $this->encode($data[$key]),
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
            $this->assertDatabaseHas('desired_jobs', [$key => $data[$key]]);
        }
    }

    public function testCreateNewDesiredJobWithoutRequiredFields(): void
    {
        $this->getTestingUser();

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')->makeCall();

        $response->assertStatus(422);
        $this->assertValidationErrorContain([
            'activity_domain_id' => 'The activity domain id field is required.',
            'activity_domain_job_id' => 'The activity domain job id field is required.',
            'ready_date' => 'The ready date field is required.',
        ]);
    }
}
