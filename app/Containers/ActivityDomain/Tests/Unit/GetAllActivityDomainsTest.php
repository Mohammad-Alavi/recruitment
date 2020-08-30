<?php

namespace App\Containers\ActivityDomain\Tests\Unit;

use App\Containers\ActivityDomain\Actions\GetAllActivityDomainsAction;
use App\Containers\ActivityDomain\Data\Transporters\GetAllActivityDomainsTransporter;
use App\Containers\ActivityDomain\Tests\TestCase;
use Illuminate\Support\Facades\App;

/**
 * Class GetAllActivityDomainsTest.
 *
 * @group activity-domain
 * @group unit
 */
class GetAllActivityDomainsTest extends TestCase
{
    public function testGetAllActivityDomains(): void
    {
        $transporter = new GetAllActivityDomainsTransporter();
        $action = App::make(GetAllActivityDomainsAction::class);
        $domains = $action->run($transporter);

        $this->assertEquals(5, $domains->count());
    }
}
