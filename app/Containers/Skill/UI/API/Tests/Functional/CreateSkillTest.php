<?php

namespace App\Containers\Skill\UI\API\Tests\Functional;

use App\Containers\Skill\Models\Skill;
use App\Containers\Skill\Tests\ApiTestCase;

/**
 * Class CreateSkillTest.
 *
 * @group skill
 * @group api
 */
class CreateSkillTest extends ApiTestCase
{
    protected $endpoint = 'post@v1/users/{user_id}/skills';

    public function testCreateNewSkillAsAnOwner(): void
    {
        $this->getTestingUser();

        $data = [
            'user_id' => $this->testingUser->id,
            'name' => 'قالی بافی',
            'skill_level' => 'low',
            'from_date' => '20080909',
            'to_date' => '20081010',
        ];

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')->makeCall($data);

        // assert the response status
        $response->assertStatus(201);

        // assert returned skill is the updated one
        $this->assertResponseContainKeyValue([
            'object' => 'Skill',
        ]);

        foreach ($data as $key => $value) {
            if ($key === 'user_id') {
                $this->assertResponseContainKeyValue([
                    $key => $this->encode($this->testingUser->id),
                ]);
                continue;
            }
            $this->assertResponseContainKeyValue([
                $key => $data[$key],
            ]);
        }

        $responseContent = $this->getResponseContentObject();
        $this->assertNotEmpty($responseContent->data);

        foreach ($data as $key => $value) {
            $this->assertDatabaseHas('skills', [$key => $data[$key]]);
        }
    }

    public function testCreateNewSkillWithoutRequiredFields(): void
    {
        $this->getTestingUser();

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')->makeCall();

        $response->assertStatus(422);
        $this->assertValidationErrorContain([
            'name' => 'The name field is required.',
            'skill_level' => 'The skill level field is required.',
            'from_date' => 'The from date field is required.',
            'to_date' => 'The to date field is required.',
        ]);
    }
}
