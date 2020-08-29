<?php

namespace App\Containers\Skill\UI\API\Tests\Functional;

use App\Containers\Skill\Models\Skill;
use App\Containers\Skill\Tests\ApiTestCase;

/**
 * Class DeleteSkillTest.
 *
 * @group skill
 * @group api
 */
class DeleteSkillTest extends ApiTestCase
{
    protected $endpoint = 'delete@v1/users/{user_id}/skills/{skill_id}';

    public function testDeleteSkill(): void
    {
        $this->getTestingUser();
        $skill = factory(Skill::class)->create(['user_id' => $this->testingUser->id]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($skill->id, false, '{skill_id}')->makeCall();

        $response->assertStatus(204);
    }
}
