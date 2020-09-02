<?php

namespace App\Containers\EducationalBackground\Tests\Unit;

use App\Containers\EducationalBackground\Actions\CreateEducationalBackgroundAction;
use App\Containers\EducationalBackground\Data\Transporters\CreateEducationalBackgroundTransporter;
use App\Containers\EducationalBackground\Models\EducationalBackground;
use App\Containers\EducationalBackground\Tests\TestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\App;

/**
 * Class CreateEducationalBackgroundTest.
 *
 * @group educational-background
 * @group unit
 */
class CreateEducationalBackgroundTest extends TestCase
{
    public function testCreateEducationalBackground(): void
    {
        $this->getTestingUser();
        $data = [
            'user_id' => $this->testingUser->id,
            'field_of_study' => 'نرم افزار',
            'degree' => 'master_degree',
            'graduation_place' => 'دانشگاه آزاد اسلامی واحد آبادان',
            'grade_point_average' => 17.29,
        ];

        $transporter = new CreateEducationalBackgroundTransporter($data);
        $action = App::make(CreateEducationalBackgroundAction::class);
        $educationalBackground = $action->run($transporter);

        $this->assertInstanceOf(EducationalBackground::class, $educationalBackground);
        foreach ($data as $key => $value) {
            $this->assertEquals($educationalBackground->$key, $data[$key]);
        }

        $this->assertTrue($educationalBackground->user()->exists());
    }

    public function testThrowExceptionIfFailedToCreateEducationalBackground(): void
    {
        $this->expectException(CreateResourceFailedException::class);

        $this->getTestingUser();
        $data = [
            'user_id' => 9999,
            'field_of_study' => 'نرم افزار',
            'degree' => 'master_degree',
            'graduation_place' => 'دانشگاه آزاد اسلامی واحد آبادان',
            'grade_point_average' => 17.29,
        ];

        $transporter = new CreateEducationalBackgroundTransporter($data);
        $action = App::make(CreateEducationalBackgroundAction::class);
        $action->run($transporter);
    }
}
