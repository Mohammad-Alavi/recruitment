<?php

namespace App\Containers\ActivityDomain\Tests\Unit;

use App\Containers\ActivityDomain\Actions\GetAllActivityDomainJobsAction;
use App\Containers\ActivityDomain\Data\Transporters\GetAllActivityDomainJobsTransporter;
use App\Containers\ActivityDomain\Tests\TestCase;
use Illuminate\Support\Facades\App;

/**
 * Class GetAllActivityDomainJobsTest.
 *
 * @group activity-domain
 * @group unit
 */
class GetAllActivityDomainJobsTest extends TestCase
{
    public function testGetAllActivityDomainJobs(): void
    {
        $transporter = new GetAllActivityDomainJobsTransporter();
        $action = App::make(GetAllActivityDomainJobsAction::class);
        $domains = $action->run($transporter);

        $this->assertEquals(15, $domains->count());
    }
}
