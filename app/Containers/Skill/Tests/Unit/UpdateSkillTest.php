<?php

namespace App\Containers\Skill\Tests\Unit;

use App\Containers\Skill\Actions\UpdateSkillAction;
use App\Containers\Skill\Data\Transporters\UpdateSkillTransporter;
use App\Containers\Skill\Models\Skill;
use App\Containers\Skill\Tests\TestCase;
use Illuminate\Support\Facades\App;

/**
 * Class UpdateSkillTest.
 *
 * @group skill
 * @group unit
 */
class UpdateSkillTest extends TestCase
{
    public function testUpdateSkillTest(): void
    {
        $skill = factory(Skill::class)->create();

        $SkillNewData = [
            'name' => 'Cafe Dice',
            'skill_level' => 'high',
            'skill_id' => $skill->id,
        ];

        $transporter = new UpdateSkillTransporter($SkillNewData);
        $action = App::make(UpdateSkillAction::class);
        $updatedSkill = $action->run($transporter);

        $this->assertEquals($SkillNewData['skill_id'], $updatedSkill->id);
        $this->assertEquals($SkillNewData['name'], $updatedSkill->name);
        $this->assertEquals($SkillNewData['skill_level'], $updatedSkill->skill_level);
    }
}
