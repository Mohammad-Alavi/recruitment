<?php

namespace App\Containers\EducationalBackground\UI\API\Tests\Functional;

use App\Containers\EducationalBackground\Models\EducationalBackground;
use App\Containers\EducationalBackground\Tests\ApiTestCase;

/**
 * Class DeleteEducationalBackgroundTest.
 *
 * @group educational-background
 * @group api
 */
class DeleteEducationalBackgroundTest extends ApiTestCase
{
    protected $endpoint = 'delete@v1/users/{user_id}/educational-backgrounds/{educational_background_id}';

    public function testDeleteEducationalBackground(): void
    {
        $this->getTestingUser();
        $educational_background = factory(EducationalBackground::class)->create(['user_id' => $this->testingUser->id]);

        $response = $this->injectId($this->testingUser->id, false, '{user_id}')
            ->injectId($educational_background->id, false, '{educational_background_id}')->makeCall();

        $response->assertStatus(204);
    }
}
