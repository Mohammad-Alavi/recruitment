<?php

namespace App\Containers\DesiredJob\UI\API\Tests\Functional;

use App\Containers\DesiredJob\Models\DesiredJob;
use App\Containers\DesiredJob\Tests\ApiTestCase;

/**
 * Class DeleteDesiredJobTest.
 *
 * @group desired-job
 * @group api
 */
class DeleteDesiredJobTest extends ApiTestCase
{
    protected $endpoint = 'delete@v1/users/{user_id}/desired_jobs/{desired_job_id}';

    public function testDeleteDesiredJob(): void
    {
        $this->getTestingUser();
        $desiredJob = factory(DesiredJob::class)->create(['user_id' => $this->testingUser->id]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($desiredJob->id, false, '{desired_job_id}')->makeCall();
        $response->assertStatus(204);
    }
}
