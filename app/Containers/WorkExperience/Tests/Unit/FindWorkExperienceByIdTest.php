<?php

namespace App\Containers\WorkExperience\Tests\Unit;

use App\Containers\WorkExperience\Actions\FindWorkExperienceByIdAction;
use App\Containers\WorkExperience\Data\Transporters\FindWorkExperienceByIdTransporter;
use App\Containers\WorkExperience\Models\WorkExperience;
use App\Containers\WorkExperience\Tests\TestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\App;

/**
 * Class FindWorkExperienceByIdTest.
 *
 * @group work-experience
 * @group unit
 */
class FindWorkExperienceByIdTest extends TestCase
{
    public function testFindWorkExperienceById(): void
    {
        $workExperience = factory(WorkExperience::class)->create();
        $findTransporter = new FindWorkExperienceByIdTransporter([
            'work_experience_id' => $workExperience->id
        ]);
        $findAction = App::make(FindWorkExperienceByIdAction::class);
        $foundWorkExperience = $findAction->run($findTransporter);

        $this->assertInstanceOf(WorkExperience::class, $foundWorkExperience);
        $this->assertEquals($foundWorkExperience->id, $workExperience->id);
    }

    public function testThrowExceptionIfWorkExperienceNotFound(): void
    {
        $this->expectException(NotFoundException::class);

        $findTransporter = new FindWorkExperienceByIdTransporter([
            'work_experience_id' => 7777,
        ]);
        $findAction = App::make(FindWorkExperienceByIdAction::class);
        $findAction->run($findTransporter);
    }
}
