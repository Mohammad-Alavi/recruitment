<?php

namespace App\Containers\EducationalBackground\Tests\Unit;

use App\Containers\EducationalBackground\Actions\FindEducationalBackgroundByIdAction;
use App\Containers\EducationalBackground\Data\Transporters\FindEducationalBackgroundByIdTransporter;
use App\Containers\EducationalBackground\Models\EducationalBackground;
use App\Containers\EducationalBackground\Tests\TestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\App;

/**
 * Class FindEducationalBackgroundByIdTest.
 *
 * @group educational-background
 * @group unit
 */
class FindEducationalBackgroundByIdTest extends TestCase
{
    public function testFindEducationalBackgroundById(): void
    {
        $workExperience = factory(EducationalBackground::class)->create();
        $findTransporter = new FindEducationalBackgroundByIdTransporter([
            'educational_background_id' => $workExperience->id
        ]);
        $findAction = App::make(FindEducationalBackgroundByIdAction::class);
        $foundEducationalBackground = $findAction->run($findTransporter);

        $this->assertInstanceOf(EducationalBackground::class, $foundEducationalBackground);
        $this->assertEquals($foundEducationalBackground->id, $workExperience->id);
    }

    public function testThrowExceptionIfEducationalBackgroundNotFound(): void
    {
        $this->expectException(NotFoundException::class);

        $findTransporter = new FindEducationalBackgroundByIdTransporter([
            'educational_background_id' => 7777,
        ]);
        $findAction = App::make(FindEducationalBackgroundByIdAction::class);
        $findAction->run($findTransporter);
    }
}
