<?php

namespace App\Containers\DesiredJob\UI\API\Tests\Functional;

use App\Containers\DesiredJob\Models\DesiredJob;
use App\Containers\DesiredJob\Tests\ApiTestCase;
use Illuminate\Support\Carbon;

/**
 * Class FindDesiredJobByIdTest.
 *
 * @group desired-job
 * @group api
 */
class FindDesiredJobByIdTest extends ApiTestCase
{
    protected $endpoint = 'get@v1/users/{user_id}/desired-jobs/{desired_job_id}';

    public function testFindDesiredJob(): void
    {
        $this->getTestingUser();
        $desiredJob = factory(DesiredJob::class)->create(['user_id' => $this->testingUser->id]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($desiredJob->id, false, '{desired_job_id}')
            ->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();
        $this->assertEquals($desiredJob->id, $this->decode($responseContent->data->id));
        $this->assertEquals($desiredJob->user_id, $this->decode($responseContent->data->user_id));
        $this->assertEquals($desiredJob->activity_domain_id, $this->decode($responseContent->data->activity_domain_id));
        $this->assertEquals($desiredJob->activity_domain_job_id, $this->decode($responseContent->data->activity_domain_job_id));
    }

    public function testFindFilteredDesiredJobResponse(): void
    {
        $this->getTestingUser();
        $desiredJob = factory(DesiredJob::class)->create(['user_id' => $this->testingUser->id]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($desiredJob->id, false, '{desired_job_id}')
            ->endpoint($this->endpoint . '?filter=user_id')
            ->makeCall();

        $response->assertStatus(200);

        $this->assertResponseContainKeyValue([
            'user_id' => $this->encode($desiredJob->user_id),
        ]);

        $response->assertJsonMissing([
            'id' => $this->encode($desiredJob->id),
            'ready_date' => $desiredJob->ready_date,
            'activity_domain_id' => $this->encode($desiredJob->activity_domain_id),
            'activity_domain_job_id' => $this->encode($desiredJob->activity_domain_job_id),
        ]);
    }

    public function testFindDesiredJobWithRelation(): void
    {
        $this->getTestingUser();
        $desiredJob = factory(DesiredJob::class)->create(['user_id' => $this->testingUser->id]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($desiredJob->id, false, '{desired_job_id}')
            ->endpoint($this->endpoint . '?include=user')
            ->makeCall();

        $response->assertStatus(200);

        $this->assertResponseContainKeys([
            'user',
        ]);

        $this->assertResponseContainKeyValue([
            'id' => $this->encode($desiredJob->id),
            'ready_date' => Carbon::createFromFormat('Ymd', $desiredJob->ready_date)->toDateString(),
            'activity_domain_id' => $this->encode($desiredJob->activity_domain_id),
            'activity_domain_job_id' => $this->encode($desiredJob->activity_domain_job_id),
        ]);

        $responseContent = $this->getResponseContentObject();
        $this->assertNotNull($responseContent->data->user);
    }
}
