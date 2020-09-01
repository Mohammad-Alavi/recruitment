<?php

namespace App\Containers\Skill\UI\API\Tests\Functional;

use App\Containers\Skill\Models\Skill;
use App\Containers\Skill\Tests\ApiTestCase;

/**
 * Class GetAllSkillsTest.
 *
 * @group skill
 * @group api
 */
class GetAllSkillsTest extends ApiTestCase
{
    protected $endpoint = 'get@v1/users/{user_id}/skills';

    public function testGetAllSkillsByOwner(): void
    {
        $this->getTestingUser();
        $skills = factory(Skill::class, 4)->create(['user_id' => $this->testingUser->id]);
        factory(Skill::class, 4)->create();

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->makeCall();

        $response->assertStatus(200);

        $responseContent = $this->getResponseContentObject();

        $this->assertCount(4, $responseContent->data);

        foreach ($skills as $skill) {
            $this->assertEquals($this->testingUser->id, $skill->user_id);
        }
    }

    public function testSearchSkillsByName(): void
    {
        $this->getTestingUser();
        factory(Skill::class, 4)->create(['user_id' => $this->testingUser->id]);
        $skill = factory(Skill::class)->create([
            'user_id' => $this->testingUser->id,
            'name' => 'Cafe Hantoosh'
        ]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->endpoint($this->endpoint . '?search=name:Cafe+Hantoosh')
            ->makeCall();

        $response->assertStatus(200);
        $responseArray = $response->decodeResponseJson();
        $this->assertEquals($skill->name, $responseArray['data'][0]['name']);
        $this->assertCount(1, $responseArray['data']);
    }
}
