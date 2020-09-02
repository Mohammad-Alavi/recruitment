<?php

namespace App\Containers\EducationalBackground\UI\API\Tests\Functional;

use App\Containers\EducationalBackground\Models\EducationalBackground;
use App\Containers\EducationalBackground\Tests\ApiTestCase;

/**
 * Class CreateEducationalBackgroundTest.
 *
 * @group educational-background
 * @group api
 */
class CreateEducationalBackgroundTest extends ApiTestCase
{
    protected $endpoint = 'post@v1/users/{user_id}/educational-backgrounds';

    public function testCreateNewEducationalBackgroundAsAnOwner(): void
    {
        $this->getTestingUser();
        $data = [
            'user_id' => $this->testingUser->id,
            'field_of_study' => 'نرم افزار',
            'degree' => 'master_degree',
            'graduation_place' => 'دانشگاه آزاد اسلامی واحد آبادان',
            'grade_point_average' => 17.29,
        ];

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')->makeCall($data);

        $response->assertStatus(201);
        $this->assertResponseContainKeyValue([
            'object' => 'EducationalBackground',
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
            $this->assertDatabaseHas('educational_backgrounds', [$key => $data[$key]]);
        }
    }
}
