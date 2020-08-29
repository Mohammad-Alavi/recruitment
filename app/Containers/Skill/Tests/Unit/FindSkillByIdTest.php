<?php

namespace App\Containers\Skill\Tests\Unit;

use App\Containers\Skill\Actions\FindSkillByIdAction;
use App\Containers\Skill\Data\Transporters\FindSkillByIdTransporter;
use App\Containers\Skill\Models\Skill;
use App\Containers\Skill\Tests\TestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\App;

/**
 * Class FindSkillByIdTest.
 *
 * @group skill
 * @group unit
 */
class FindSkillByIdTest extends TestCase
{
    public function testFindSkillById(): void
    {
        $skill = factory(Skill::class)->create();

        $findTransporter = new FindSkillByIdTransporter([
            'skill_id' => $skill->id
        ]);
        $findAction = App::make(FindSkillByIdAction::class);
        $foundSkill = $findAction->run($findTransporter);

        $this->assertInstanceOf(Skill::class, $foundSkill);
        $this->assertEquals($foundSkill->id, $skill->id);
    }

    public function testThrowExceptionIfSkillNotFound(): void
    {
        $this->expectException(NotFoundException::class);

        // No Skill with id of 7777 exist
        $findTransporter = new FindSkillByIdTransporter([
            'skill_id' => 7777,
        ]);
        $findAction = App::make(FindSkillByIdAction::class);
        $findAction->run($findTransporter);
    }
}
