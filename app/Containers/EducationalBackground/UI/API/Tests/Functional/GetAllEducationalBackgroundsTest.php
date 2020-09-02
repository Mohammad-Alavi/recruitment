<?php

namespace App\Containers\EducationalBackground\UI\API\Tests\Functional;

use App\Containers\EducationalBackground\Models\EducationalBackground;
use App\Containers\EducationalBackground\Tests\ApiTestCase;

/**
 * Class GetAllEducationalBackgroundsTest.
 *
 * @group educational-background
 * @group api
 */
class GetAllEducationalBackgroundsTest extends ApiTestCase
{
    protected $endpoint = 'get@v1/users/{user_id}/educational-backgrounds';

    public function testGetAllEducationalBackgroundsByOwner(): void
    {
        $this->getTestingUser();
        $educationalBackgrounds = factory(EducationalBackground::class, 4)->create(['user_id' => $this->testingUser->id]);
        factory(EducationalBackground::class, 4)->create();

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();
        $this->assertCount(4, $responseContent->data);
        foreach ($educationalBackgrounds as $educationalBackground) {
            $this->assertEquals($this->testingUser->id, $educationalBackground->user_id);
        }
    }

    public function testSearchEducationalBackgroundsByWorkPlaceName(): void
    {
        $this->getTestingUser();
        factory(EducationalBackground::class, 4)->create(['user_id' => $this->testingUser->id]);
        $educationalBackground = factory(EducationalBackground::class)->create([
            'user_id' => $this->testingUser->id,
            'field_of_study' => 'Cafe Hantoosh'
        ]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->endpoint($this->endpoint . '?search=field_of_study:Cafe+Hantoosh')
            ->makeCall();

        $response->assertStatus(200);
        $responseArray = $response->decodeResponseJson();
        $this->assertEquals($educationalBackground->field_of_study, $responseArray['data'][0]['field_of_study']);
        $this->assertCount(1, $responseArray['data']);
    }
}
