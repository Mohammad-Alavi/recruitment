<?php

namespace App\Containers\WorkExperience\Tests\Unit;

use App\Containers\WorkExperience\Actions\CreateWorkExperienceAction;
use App\Containers\WorkExperience\Data\Transporters\CreateWorkExperienceTransporter;
use App\Containers\WorkExperience\Models\WorkExperience;
use App\Containers\WorkExperience\Tests\TestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\App;

/**
 * Class CreateWorkExperienceTest.
 *
 * @group work-experience
 * @group unit
 */
class CreateWorkExperienceTest extends TestCase
{
    public function testCreateWorkExperience(): void
    {
        $this->getTestingUser();
        $data = [
            'user_id' => $this->testingUser->id,
            'work_place_name' => 'work name',
            'type_of_work' => 'workin like dawg',
            'work_duration_year' => 2,
            'work_duration_month' => 5,
            'insurance_duration_year' => 1,
            'insurance_duration_month' => 9,
            'activity_termination_reason' => 'resignation',
            'employer_name' => 'Fag System',
            'employer_number' => '09391079907',
        ];

        $transporter = new CreateWorkExperienceTransporter($data);
        $action = App::make(CreateWorkExperienceAction::class);
        $WorkExperience = $action->run($transporter);

        $this->assertInstanceOf(WorkExperience::class, $WorkExperience);
        foreach ($data as $key => $value) {
            $this->assertEquals($WorkExperience->$key, $data[$key]);
        }

        $this->assertTrue($WorkExperience->user()->exists());
    }

    public function testThrowExceptionIfFailedToCreateWorkExperience(): void
    {
        $this->expectException(CreateResourceFailedException::class);

        $this->getTestingUser();
        $data = [
            'user_id' => 9999,
            'work_place_name' => 'work name',
            'type_of_work' => 'workin like dawg',
            'work_duration_year' => 2,
            'work_duration_month' => 5,
            'insurance_duration_year' => 1,
            'insurance_duration_month' => 9,
            'activity_termination_reason' => 'resignation',
            'employer_name' => 'Fag System',
            'employer_number' => '09391079907',
        ];

        $transporter = new CreateWorkExperienceTransporter($data);
        $action = App::make(CreateWorkExperienceAction::class);
        $action->run($transporter);
    }
}
