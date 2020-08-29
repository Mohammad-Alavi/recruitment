<?php

namespace App\Containers\Skill\Tests\Unit;

use App\Containers\Skill\Actions\DeleteSkillAction;
use App\Containers\Skill\Data\Transporters\DeleteSkillTransporter;
use App\Containers\Skill\Models\Skill;
use App\Containers\Skill\Tests\TestCase;
use App\Ship\Exceptions\DeleteResourceFailedException;
use Illuminate\Support\Facades\App;

/**
 * Class DeleteSkillTest.
 *
 * @group skill
 * @group unit
 */
class DeleteSkillTest extends TestCase
{
	public function testDeleteSkill(): void
	{
		$Skill = factory(Skill::class)->create();

		// Create transporter and action
		$deleteTransporter = new DeleteSkillTransporter(['skill_id' => $Skill->id]);
		$deleteAction = App::make(DeleteSkillAction::class);
		// Delete Skill using action
		$deleteAction->run($deleteTransporter);

		// Assert deletion
		$this->assertDeleted('skills', ['id' => $Skill->id]);
	}

	public function testThrowExceptionIfFailedToDeleteSkill(): void
	{
		$this->expectException(DeleteResourceFailedException::class);

		// No Skill with id of 7777 exist
		$deleteTransporter = new DeleteSkillTransporter(['skill_id' => 7777]);
		$deleteAction = App::make(DeleteSkillAction::class);
		$deleteAction->run($deleteTransporter);
	}
}
