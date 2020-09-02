<?php

namespace App\Containers\EducationalBackground\Tests\Unit;

use App\Containers\EducationalBackground\Actions\GetAllEducationalBackgroundsAction;
use App\Containers\EducationalBackground\Data\Transporters\GetAllEducationalBackgroundsTransporter;
use App\Containers\EducationalBackground\Models\EducationalBackground;
use App\Containers\EducationalBackground\Tests\TestCase;
use Illuminate\Support\Facades\App;

/**
 * Class GetAllEducationalBackgroundsTest.
 *
 * @group educational-background
 * @group unit
 */
class GetAllEducationalBackgroundsTest extends TestCase
{
    public function testGetAllEducationalBackgrounds(): void
    {
        $this->getTestingUser();
        factory(EducationalBackground::class, 5)->create(['user_id' => $this->testingUser->id]);
        factory(EducationalBackground::class, 5)->create();

        $transporter = new GetAllEducationalBackgroundsTransporter(['user_id' => $this->testingUser->id]);
        $action = App::make(GetAllEducationalBackgroundsAction::class);
        $educationalBackgrounds = $action->run($transporter);

        $this->assertEquals(5, $educationalBackgrounds->count());

        foreach ($educationalBackgrounds as $educationalBackground) {
            $this->assertEquals($this->testingUser->id, $educationalBackground->user_id);
        }
    }
}
