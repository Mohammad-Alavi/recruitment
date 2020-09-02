<?php

namespace App\Containers\EducationalBackground\Tests\Unit;

use App\Containers\EducationalBackground\Actions\UpdateEducationalBackgroundAction;
use App\Containers\EducationalBackground\Data\Transporters\UpdateEducationalBackgroundTransporter;
use App\Containers\EducationalBackground\Models\EducationalBackground;
use App\Containers\EducationalBackground\Tests\TestCase;
use Illuminate\Support\Facades\App;

/**
 * Class UpdateEducationalBackgroundTest.
 *
 * @group educational-background
 * @group unit
 */
class UpdateEducationalBackgroundTest extends TestCase
{
    public function testUpdateEducationalBackgroundTest(): void
    {
        $educationalBackground = factory(EducationalBackground::class)->create();
        $educationalBackgroundNewData = [
            'educational_background_id' => $educationalBackground->id,
            'field_of_study' => 'نرم افزار',
            'degree' => 'master_degree',
            'graduation_place' => 'دانشگاه آزاد اسلامی واحد آبادان',
            'grade_point_average' => 17.29,
        ];

        $transporter = new UpdateEducationalBackgroundTransporter($educationalBackgroundNewData);
        $action = App::make(UpdateEducationalBackgroundAction::class);
        $updatedEducationalBackground = $action->run($transporter);

        $this->assertEquals($educationalBackgroundNewData['educational_background_id'], $updatedEducationalBackground->id);
        $this->assertEquals($educationalBackgroundNewData['field_of_study'], $updatedEducationalBackground->field_of_study);
        $this->assertEquals($educationalBackgroundNewData['degree'], $updatedEducationalBackground->degree);
        $this->assertEquals($educationalBackgroundNewData['graduation_place'], $updatedEducationalBackground->graduation_place);
        $this->assertEquals($educationalBackgroundNewData['grade_point_average'], $updatedEducationalBackground->grade_point_average);
    }
}
