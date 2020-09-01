<?php

namespace App\Containers\WorkExperience\Tests\Unit;

use App\Containers\WorkExperience\Actions\UpdateWorkExperienceAction;
use App\Containers\WorkExperience\Data\Transporters\UpdateWorkExperienceTransporter;
use App\Containers\WorkExperience\Models\WorkExperience;
use App\Containers\WorkExperience\Tests\TestCase;
use Illuminate\Support\Facades\App;

/**
 * Class UpdateWorkExperienceTest.
 *
 * @group work-experience
 * @group unit
 */
class UpdateWorkExperienceTest extends TestCase
{
    public function testUpdateWorkExperienceTest(): void
    {
        $workExperience = factory(WorkExperience::class)->create();
        $WorkExperienceNewData = [
            'work_experience_id' => $workExperience->id,
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

        $transporter = new UpdateWorkExperienceTransporter($WorkExperienceNewData);
        $action = App::make(UpdateWorkExperienceAction::class);
        $updatedWorkExperience = $action->run($transporter);

        $this->assertEquals($WorkExperienceNewData['work_experience_id'], $updatedWorkExperience->id);
        $this->assertEquals($WorkExperienceNewData['work_place_name'], $updatedWorkExperience->work_place_name);
        $this->assertEquals($WorkExperienceNewData['type_of_work'], $updatedWorkExperience->type_of_work);
        $this->assertEquals($WorkExperienceNewData['work_duration_year'], $updatedWorkExperience->work_duration_year);
        $this->assertEquals($WorkExperienceNewData['work_duration_month'], $updatedWorkExperience->work_duration_month);
        $this->assertEquals($WorkExperienceNewData['insurance_duration_year'], $updatedWorkExperience->insurance_duration_year);
        $this->assertEquals($WorkExperienceNewData['insurance_duration_month'], $updatedWorkExperience->insurance_duration_month);
        $this->assertEquals($WorkExperienceNewData['activity_termination_reason'], $updatedWorkExperience->activity_termination_reason);
        $this->assertEquals($WorkExperienceNewData['employer_name'], $updatedWorkExperience->employer_name);
        $this->assertEquals($WorkExperienceNewData['employer_number'], $updatedWorkExperience->employer_number);
    }
}
