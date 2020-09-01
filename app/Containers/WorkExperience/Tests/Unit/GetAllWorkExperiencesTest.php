<?php

namespace App\Containers\WorkExperience\Tests\Unit;

use App\Containers\WorkExperience\Actions\GetAllWorkExperiencesAction;
use App\Containers\WorkExperience\Data\Transporters\GetAllWorkExperiencesTransporter;
use App\Containers\WorkExperience\Models\WorkExperience;
use App\Containers\WorkExperience\Tests\TestCase;
use Illuminate\Support\Facades\App;

/**
 * Class GetAllWorkExperiencesTest.
 *
 * @group work-experience
 * @group unit
 */
class GetAllWorkExperiencesTest extends TestCase
{
    public function testGetAllWorkExperiences(): void
    {
        $this->getTestingUser();
        factory(WorkExperience::class, 5)->create(['user_id' => $this->testingUser->id]);
        factory(WorkExperience::class, 5)->create();

        $transporter = new GetAllWorkExperiencesTransporter(['user_id' => $this->testingUser->id]);
        $action = App::make(GetAllWorkExperiencesAction::class);
        $categories = $action->run($transporter);

        $this->assertEquals(5, $categories->count());

        foreach ($categories as $workExperience) {
            $this->assertEquals($this->testingUser->id, $workExperience->user_id);
        }
    }
}
