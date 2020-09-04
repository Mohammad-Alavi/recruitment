<?php

namespace App\Containers\HealthSelfDeclaration\Tests\Unit;

use App\Containers\HealthSelfDeclaration\Actions\CreateHealthSelfDeclarationAction;
use App\Containers\HealthSelfDeclaration\Data\Transporters\CreateHealthSelfDeclarationTransporter;
use App\Containers\HealthSelfDeclaration\Models\HealthSelfDeclaration;
use App\Containers\HealthSelfDeclaration\Tests\TestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\App;

/**
 * Class CreateHealthSelfDeclarationTest.
 *
 * @group health-self-declaration
 * @group unit
 */
class CreateHealthSelfDeclarationTest extends TestCase
{
    public function testCreateHealthSelfDeclaration(): void
    {
        $this->getTestingUser();
        $data = [
            'user_id' => $this->testingUser->id,
            'health_options' => [
                [
                    'title' => 'شکستگی استخوان',
                    'answer' => 0,
                    'description' => 'پام شکست صدا سگ دادم'
                ],
                [
                    'title' => 'شکستگی باسن',
                    'answer' => 1,
                    'description' => 'جای واکسن، روی باسن'
                ],
                [
                    'title' => 'قطع شدگی بلبول',
                    'answer' => 0,
                    'description' => 'بلبول ایز نو مور'
                ]
            ],
            'blood_type' => 'A+',
        ];

        $transporter = new CreateHealthSelfDeclarationTransporter($data);
        $action = App::make(CreateHealthSelfDeclarationAction::class);
        $healthSelfDeclaration = $action->run($transporter);

        $this->assertInstanceOf(HealthSelfDeclaration::class, $healthSelfDeclaration);
        $this->assertEquals($data['blood_type'], $healthSelfDeclaration->blood_type);
        $this->assertEquals($healthSelfDeclaration->health_options, json_encode($data['health_options'], JSON_THROW_ON_ERROR));
        $this->assertTrue($healthSelfDeclaration->user()->exists());
    }

    public function testThrowExceptionIfFailedToCreateHealthSelfDeclaration(): void
    {
        $this->expectException(CreateResourceFailedException::class);

        $this->getTestingUser();

        $data = [
            'user_id' => 9999,
            'health_options' => [
                [
                    'title' => 'شکستگی استخوان',
                    'answer' => 0,
                    'description' => 'پام شکست صدا سگ دادم'
                ],
                [
                    'title' => 'شکستگی باسن',
                    'answer' => 1,
                    'description' => 'جای واکسن، روی باسن'
                ],
                [
                    'title' => 'قطع شدگی بلبول',
                    'answer' => 0,
                    'description' => 'بلبول ایز نو مور'
                ]
            ],
            'blood_type' => 'A+',
        ];

        $transporter = new CreateHealthSelfDeclarationTransporter($data);
        $action = App::make(CreateHealthSelfDeclarationAction::class);
        $action->run($transporter);
    }
}
