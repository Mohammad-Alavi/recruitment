<?php

namespace App\Containers\WorkExperience\Tests\Unit;

use App\Containers\WorkExperience\Actions\DeleteWorkExperienceAction;
use App\Containers\WorkExperience\Data\Transporters\DeleteWorkExperienceTransporter;
use App\Containers\WorkExperience\Models\WorkExperience;
use App\Containers\WorkExperience\Tests\TestCase;
use App\Ship\Exceptions\DeleteResourceFailedException;
use Illuminate\Support\Facades\App;

/**
 * Class DeleteWordExperienceTest.
 *
 * @group work-experience
 * @group unit
 */
class DeleteWordExperienceTest extends TestCase
{
	public function testDeleteWorkExperience(): void
	{
		$WorkExperience = factory(WorkExperience::class)->create();

		$deleteTransporter = new DeleteWorkExperienceTransporter(['work_experience_id' => $WorkExperience->id]);
		$deleteAction = App::make(DeleteWorkExperienceAction::class);
		$deleteAction->run($deleteTransporter);

		$this->assertDeleted('work_experiences', ['id' => $WorkExperience->id]);
	}

	public function testThrowExceptionIfFailedToDeleteWorkExperience(): void
	{
		$this->expectException(DeleteResourceFailedException::class);

		$deleteTransporter = new DeleteWorkExperienceTransporter(['work_experience_id' => 7777]);
		$deleteAction = App::make(DeleteWorkExperienceAction::class);
		$deleteAction->run($deleteTransporter);
	}
}
