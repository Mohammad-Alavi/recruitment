<?php

namespace App\Containers\DesiredJob\UI\API\Tests\Functional;

use App\Containers\DesiredJob\Models\DesiredJob;
use App\Containers\DesiredJob\Tests\ApiTestCase;
use Illuminate\Support\Carbon;

/**
 * Class UpdateDesiredJobTest.
 *
 * @group desired-job
 * @group api
 */
class UpdateDesiredJobTest extends ApiTestCase
{
    protected $endpoint = 'patch@v1/users/{user_id}/desired_jobs/{desired_job_id}';

    protected $access = [
        'roles' => '',
        'permissions' => '',
    ];

    public function testUpdateExistingDesiredJob(): void
    {
        $this->getTestingUser();
        $desiredJob = factory(DesiredJob::class)->create(['user_id' => $this->testingUser->id]);
        $data = [
            'activity_domain_id' => 2,
            'activity_domain_job_id' => 6,
            'ready_date' => '20040302',
        ];

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($desiredJob->id, false, '{desired_job_id}')
            ->makeCall($data);

        $response->assertStatus(200);
        $this->assertResponseContainKeyValue([
            'object' => 'DesiredJob',
            'activity_domain_id' => $this->encode($data['activity_domain_id']),
            'activity_domain_job_id' => $this->encode($data['activity_domain_job_id']),
            'ready_date' => Carbon::createFromFormat('Ymd', $data['ready_date'])->toDateString(),
        ]);
        foreach ($data as $key => $value) {
            $this->assertDatabaseHas('desired_jobs', [$key => $data[$key]]);
        }
    }

    public function testUpdateNonExistingDesiredJob(): void
    {
        $this->getTestingUser();

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId(6666, false, '{desired_job_id}')
            ->makeCall();

        $response->assertStatus(422);

        $this->assertResponseContainKeys([
            'errors'
        ]);
    }

    public function testUpdateExistingDesiredJobWithInvalidValues(): void
    {
        $this->getTestingUser();
        $desiredJob = factory(DesiredJob::class)->create(['user_id' => $this->testingUser->id]);

        $data = [
            'activity_domain_id' => 'test',
            'activity_domain_job_id' => 'string',
            'ready_date' => '20040302123',
        ];

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($desiredJob->id, false, '{desired_job_id}')
            ->makeCall($data);

        $response->assertStatus(422);
        $this->assertValidationErrorContain([
            'activity_domain_id' => 'The selected activity domain id is invalid.',
            'activity_domain_job_id' => 'The selected activity domain job id is invalid.',
            'ready_date' => 'The ready date does not match the format Ymd.',
        ]);
    }
}
