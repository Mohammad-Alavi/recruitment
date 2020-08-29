<?php

namespace App\Containers\Skill\UI\API\Tests\Functional;

use App\Containers\Skill\Models\Skill;
use App\Containers\Skill\Tests\ApiTestCase;

/**
 * Class FindSkillByIdTest.
 *
 * @group skill
 * @group api
 */
class FindSkillByIdTest extends ApiTestCase
{
    protected $endpoint = 'get@v1/users/{user_id}/skills/{skill_id}';

    public function testFindSkill(): void
    {
        $this->getTestingUser();
        $skill = factory(Skill::class)->create(['user_id' => $this->testingUser->id]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($skill->id, false, '{skill_id}')
            ->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertEquals($skill->id, $this->decode($responseContent->data->id));
        $this->assertEquals($skill->name, $responseContent->data->name);
    }

    public function testFindFilteredSkillResponse(): void
    {
        $this->getTestingUser();
        $skill = factory(Skill::class)->create(['user_id' => $this->testingUser->id]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($skill->id, false, '{skill_id}')
            ->endpoint($this->endpoint . '?filter=name')
            ->makeCall();

        // assert response status is correct
        $response->assertStatus(200);

        $this->assertResponseContainKeyValue([
            'name' => $skill->name,
        ]);

        $response->assertJsonMissing([
            'id' => $this->encode($skill->id),
            'user_id' => $this->encode($skill->user_id),
        ]);
    }

    public function testFindSkillWithRelation(): void
    {
        $this->getTestingUser();
        $skill = factory(Skill::class)->create(['user_id' => $this->testingUser->id]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($skill->id, false, '{skill_id}')
            ->endpoint($this->endpoint . '?include=user')
            ->makeCall();

        $response->assertStatus(200);
        $this->assertResponseContainKeys([
            'user',
        ]);
        $this->assertResponseContainKeyValue([
            'name' => $skill->name,
        ]);
        $responseContent = $this->getResponseContentObject();
        $this->assertNotNull($responseContent->data->user);
    }
}
