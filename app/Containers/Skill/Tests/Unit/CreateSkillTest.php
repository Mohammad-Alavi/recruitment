<?php

namespace App\Containers\Skill\Tests\Unit;

use App\Containers\Skill\Actions\CreateSkillAction;
use App\Containers\Skill\Data\Transporters\CreateSkillTransporter;
use App\Containers\Skill\Models\Skill;
use App\Containers\Skill\Tests\TestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\App;

/**
 * Class CreateSkillTest.
 *
 * @group skill
 * @group unit
 */
class CreateSkillTest extends TestCase
{
    public function testCreateSkill(): void
    {
        $this->getTestingUser();
        $data = [
            'user_id' => $this->testingUser->id,
            'name' => 'قالی بافی',
            'skill_level' => 'medium',
            'from_date' => '20080909',
            'to_date' => '20081010',
        ];

        $transporter = new CreateSkillTransporter($data);
        $action = App::make(CreateSkillAction::class);
        $Skill = $action->run($transporter);

        // assert the returned object is an instance of the Skill
        $this->assertInstanceOf(Skill::class, $Skill);
        // assert fields are equal
        foreach ($data as $key => $value) {
            $this->assertEquals($Skill->$key, $data[$key]);
        }

        // assert relation with Owner exist
        $this->assertTrue($Skill->user()->exists());
    }

    public function testThrowExceptionIfFailedToCreateSkill(): void
    {
        $this->expectException(CreateResourceFailedException::class);

        $this->getTestingUser();

        $data = [
            'user_id' => 9999,
            'name' => 'قالی بافی',
            'skill_level' => 'medium',
            'from_date' => '20080909',
            'to_date' => '20081010',
        ];

        $transporter = new CreateSkillTransporter($data);
        $action = App::make(CreateSkillAction::class);
        $action->run($transporter);
    }
}
