<?php

namespace App\Containers\DesiredJob\Tests\Unit;

use App\Containers\DesiredJob\Actions\CreateDesiredJobAction;
use App\Containers\DesiredJob\Data\Transporters\CreateDesiredJobTransporter;
use App\Containers\DesiredJob\Models\DesiredJob;
use App\Containers\DesiredJob\Tests\TestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;

/**
 * Class CreateDesiredJobTest.
 *
 * @group desired-job
 * @group unit
 */
class CreateDesiredJobTest extends TestCase
{
	public function testCreateDesiredJob(): void
	{
		$this->getTestingUser();

		$data = [
			'user_id' => $this->testingUser->id,
			'activity_domain_id' => 1,
			'activity_domain_job_id' => 1,
			'ready_date' => '20070505',
		];

		$transporter = new CreateDesiredJobTransporter($data);
		$action = App::make(CreateDesiredJobAction::class);
		$desiredJob = $action->run($transporter);

		$this->assertInstanceOf(DesiredJob::class, $desiredJob);
		foreach ($data as $key => $value) {
		    if ($key === 'ready_date') {
		        $this->assertEquals(Carbon::createFromFormat('Ymd', $data[$key])->toDateString(), $desiredJob->$key);
		        continue;
            }
			$this->assertEquals($data[$key], $desiredJob->$key);
		}

		$this->assertTrue($desiredJob->user()->exists());
	}

	public function testThrowExceptionIfFailedToCreateDesiredJob(): void
	{
		$this->expectException(CreateResourceFailedException::class);

		$this->getTestingUser();
		$data = [
            'user_id' => 7777,
            'activity_domain_id' => 1,
            'activity_domain_job_id' => 1,
            'ready_date' => '20070505',
		];

		$transporter = new CreateDesiredJobTransporter($data);
		$action = App::make(CreateDesiredJobAction::class);
		$action->run($transporter);
	}
}
