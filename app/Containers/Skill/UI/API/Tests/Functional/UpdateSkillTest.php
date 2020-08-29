<?php

namespace App\Containers\Skill\UI\API\Tests\Functional;

use App\Containers\Skill\Models\Skill;
use App\Containers\Skill\Tests\ApiTestCase;

/**
 * Class UpdateSkillTest.
 *
 * @group skill
 * @group api
 */
class UpdateSkillTest extends ApiTestCase
{
    protected $endpoint = 'patch@v1/users/{user_id}/skills/{skill_id}';

    protected $access = [
        'roles' => '',
        'permissions' => '',
    ];

    public function testUpdateExistingSkill(): void
    {
        $this->getTestingUser();
        $skill = factory(Skill::class)->create(['user_id' => $this->testingUser->id]);

        $data = [
            'name' => 'Shalgham Skill',
        ];

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($skill->id, false, '{skill_id}')
            ->makeCall($data);

        $response->assertStatus(200);
        $this->assertResponseContainKeyValue([
            'object' => 'Skill',
            'name' => $data['name'],
        ]);

        foreach ($data as $key => $value) {
            $this->assertDatabaseHas('skills', [$key => $data[$key]]);
        }
    }

    public function testUpdateNonExistingSkill(): void
    {
        $this->getTestingUser();

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId(6666, false, '{skill_id}')
            ->makeCall();

        $response->assertStatus(422);

        $this->assertResponseContainKeys([
            'errors'
        ]);
    }

    public function testUpdateExistingSkillWithInvalidValues(): void
    {
        $this->getTestingUser();
        $skill = factory(Skill::class)->create(['user_id' => $this->testingUser->id]);

        $data = [
            'name' => '',
            'skill_level' => '',
            'to_date' => '',
            'from_date' => '',
        ];

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($skill->id, false, '{skill_id}')
            ->makeCall($data);

        $response->assertStatus(422);

        $this->assertValidationErrorContain([
            'name' => 'The name must be at least 4 characters.',
            'skill_level' => 'The selected skill level is invalid.',
            'from_date' => 'The from date does not match the format Ymd.',
            'to_date' => 'The to date does not match the format Ymd.',
        ]);
    }
}
