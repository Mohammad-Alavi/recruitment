<?php

namespace App\Containers\DesiredJob\UI\API\Tests\Functional;

use App\Containers\DesiredJob\Models\DesiredJob;
use App\Containers\DesiredJob\Tests\ApiTestCase;

/**
 * Class GetAllDesiredJobsTest.
 *
 * @group desired-job
 * @group api
 */
class GetAllDesiredJobsTest extends ApiTestCase
{
    protected $endpoint = 'get@v1/users/{user_id}/desired_jobs';

    public function testGetAllDesiredJobsByOwner(): void
    {
        $this->getTestingUser();
        $desired_jobs = factory(DesiredJob::class, 4)->create(['user_id' => $this->testingUser->id]);
        factory(DesiredJob::class, 4)->create();

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();
        $this->assertCount(4, $responseContent->data);
        foreach ($desired_jobs as $category) {
            $this->assertEquals($this->testingUser->id, $category->user_id);
        }
    }
}
