<?php

namespace App\Containers\DesiredJob\Tests\Unit;

use App\Containers\DesiredJob\Actions\UpdateDesiredJobAction;
use App\Containers\DesiredJob\Data\Transporters\UpdateDesiredJobTransporter;
use App\Containers\DesiredJob\Models\DesiredJob;
use App\Containers\DesiredJob\Tests\TestCase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;

/**
 * Class UpdateDesiredJobTest.
 *
 * @group desired-job
 * @group unit
 */
class UpdateDesiredJobTest extends TestCase
{
    public function testUpdateDesiredJobTest(): void
    {
        $desiredJob = factory(DesiredJob::class)->create();

        $categoryNewData = [
            'desired_job_id' => $desiredJob->id,
            'activity_domain_id' => 2,
            'activity_domain_job_id' => 5,
            'ready_date' => '20060404',
        ];

        $transporter = new UpdateDesiredJobTransporter($categoryNewData);
        $action = App::make(UpdateDesiredJobAction::class);
        $updatedDesiredJob = $action->run($transporter);

        $this->assertEquals($categoryNewData['desired_job_id'], $updatedDesiredJob->id);
        $this->assertEquals($categoryNewData['activity_domain_id'], $updatedDesiredJob->activity_domain_id);
        $this->assertEquals($categoryNewData['activity_domain_job_id'], $updatedDesiredJob->activity_domain_job_id);
        $this->assertEquals(Carbon::createFromFormat('Ymd', $categoryNewData['ready_date'])->toDateString(), $updatedDesiredJob->ready_date);
    }
}
