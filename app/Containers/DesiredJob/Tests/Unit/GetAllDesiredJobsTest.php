<?php

namespace App\Containers\DesiredJob\Tests\Unit;

use App\Containers\DesiredJob\Actions\GetAllDesiredJobsAction;
use App\Containers\DesiredJob\Data\Transporters\GetAllDesiredJobsTransporter;
use App\Containers\DesiredJob\Models\DesiredJob;
use App\Containers\DesiredJob\Tests\TestCase;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\App;

/**
 * Class GetAllDesiredJobsTest.
 *
 * @group desired-job
 * @group unit
 */
class GetAllDesiredJobsTest extends TestCase
{
    public function testGetAllDesiredJobs(): void
    {
        $this->getTestingUser();
        factory(DesiredJob::class, 5)->create(['user_id' => $this->testingUser->id]);
        factory(DesiredJob::class, 5)->create();

        $transporter = new GetAllDesiredJobsTransporter(['user_id' => $this->testingUser->id]);
        $action = App::make(GetAllDesiredJobsAction::class);
        $categories = $action->run($transporter);

        $this->assertEquals(5, $categories->count());

        foreach ($categories as $desiredJob) {
            $this->assertEquals($this->testingUser->id, $desiredJob->user_id);
        }
    }
}
