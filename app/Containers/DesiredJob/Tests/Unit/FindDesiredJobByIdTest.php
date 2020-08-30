<?php

namespace App\Containers\DesiredJob\Tests\Unit;

use App\Containers\DesiredJob\Actions\FindDesiredJobByIdAction;
use App\Containers\DesiredJob\Data\Transporters\FindDesiredJobByIdTransporter;
use App\Containers\DesiredJob\Models\DesiredJob;
use App\Containers\DesiredJob\Tests\TestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\App;

/**
 * Class FindDesiredJobByIdTest.
 *
 * @group desired-job
 * @group unit
 */
class FindDesiredJobByIdTest extends TestCase
{
    public function testFindDesiredJobById(): void
    {
        $desiredJob = factory(DesiredJob::class)->create();

        $findTransporter = new FindDesiredJobByIdTransporter(['desired_job_id' => $desiredJob->id]);
        $findAction = App::make(FindDesiredJobByIdAction::class);
        $foundDesiredJob = $findAction->run($findTransporter);

        $this->assertInstanceOf(DesiredJob::class, $foundDesiredJob);
        $this->assertEquals($foundDesiredJob->id, $desiredJob->id);
    }

    public function testThrowExceptionIfDesiredJobNotFound(): void
    {
        $this->expectException(NotFoundException::class);

        $findTransporter = new FindDesiredJobByIdTransporter(['desired_job_id' => 7777]);
        $findAction = App::make(FindDesiredJobByIdAction::class);
        $findAction->run($findTransporter);
    }
}
