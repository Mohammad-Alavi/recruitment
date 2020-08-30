<?php

namespace App\Containers\DesiredJob\Tests\Unit;

use App\Containers\DesiredJob\Actions\DeleteDesiredJobAction;
use App\Containers\DesiredJob\Data\Transporters\DeleteDesiredJobTransporter;
use App\Containers\DesiredJob\Models\DesiredJob;
use App\Containers\DesiredJob\Tests\TestCase;
use App\Ship\Exceptions\DeleteResourceFailedException;
use Illuminate\Support\Facades\App;

/**
 * Class DeleteDesiredJobTest.
 *
 * @group desired-job
 * @group unit
 */
class DeleteDesiredJobTest extends TestCase
{
    public function testDeleteDesiredJob(): void
    {
        $desiredJob = factory(DesiredJob::class)->create();

        $deleteTransporter = new DeleteDesiredJobTransporter(['desired_job_id' => $desiredJob->id]);
        $deleteAction = App::make(DeleteDesiredJobAction::class);
        // Delete DesiredJob using action
        $deleteAction->run($deleteTransporter);

        // Assert deletion
        $this->assertDeleted('desired_jobs', ['id' => $desiredJob->id]);
    }

    public function testThrowExceptionIfFailedToDeleteDesiredJob(): void
    {
        $this->expectException(DeleteResourceFailedException::class);

        // No DesiredJob with id of 7777 exist
        $deleteTransporter = new DeleteDesiredJobTransporter(['desired_job_id' => 7777]);
        $deleteAction = App::make(DeleteDesiredJobAction::class);
        $deleteAction->run($deleteTransporter);
    }
}
