<?php

namespace App\Containers\Skill\Tests\Unit;

use App\Containers\Skill\Actions\GetAllSkillsAction;
use App\Containers\Skill\Data\Transporters\GetAllSkillsTransporter;
use App\Containers\Skill\Models\Skill;
use App\Containers\Skill\Tests\TestCase;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\App;

/**
 * Class GetAllSkillsTest.
 *
 * @group skill
 * @group unit
 */
class GetAllSkillsTest extends TestCase
{
	public function testGetAllSkills(): void
	{
		$this->getTestingUser();
		factory(Skill::class, 5)->create(['user_id' => $this->testingUser->id]);
		factory(Skill::class, 5)->create();

		$transporter = new GetAllSkillsTransporter(['user_id' => $this->testingUser->id]);
		$action = App::make(GetAllSkillsAction::class);
		$categories = $action->run($transporter);

		$this->assertEquals(5, $categories->count());

		foreach ($categories as $skill) {
			$this->assertEquals($this->testingUser->id, $skill->user_id);
		}
	}
}
