<?php

namespace App\Containers\EducationalBackground\UI\API\Tests\Functional;

use App\Containers\EducationalBackground\Models\EducationalBackground;
use App\Containers\EducationalBackground\Tests\ApiTestCase;

/**
 * Class UpdateEducationalBackgroundTest.
 *
 * @group educational-background
 * @group api
 */
class UpdateEducationalBackgroundTest extends ApiTestCase
{
    protected $endpoint = 'patch@v1/users/{user_id}/educational-backgrounds/{educational_background_id}';

    protected $access = [
        'roles' => '',
        'permissions' => '',
    ];

    public function testUpdateExistingEducationalBackground(): void
    {
        $this->getTestingUser();
        $educational_background = factory(EducationalBackground::class)->create(['user_id' => $this->testingUser->id]);

        $data = [
            'field_of_study' => 'نرم افزار',
            'degree' => 'master_degree',
            'graduation_place' => 'دانشگاه آزاد اسلامی واحد آبادان',
            'grade_point_average' => 17.29,
        ];

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($educational_background->id, false, '{educational_background_id}')
            ->makeCall($data);

        $response->assertStatus(200);
        $this->assertResponseContainKeyValue([
            'object' => 'EducationalBackground',
            'field_of_study' => $data['field_of_study'],
            'degree' => $data['degree'],
            'graduation_place' => $data['graduation_place'],
            'grade_point_average' => $data['grade_point_average'],
        ]);

        foreach ($data as $key => $value) {
            $this->assertDatabaseHas('educational_backgrounds', [$key => $data[$key]]);
        }
    }

    public function testUpdateNonExistingEducationalBackground(): void
    {
        $this->getTestingUser();

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId(6666, false, '{educational_background_id}')
            ->makeCall();

        $response->assertStatus(422);

        $this->assertResponseContainKeys([
            'errors'
        ]);
    }
}
