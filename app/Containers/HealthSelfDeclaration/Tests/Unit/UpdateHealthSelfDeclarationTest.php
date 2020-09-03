<?php

namespace App\Containers\HealthSelfDeclaration\Tests\Unit;

use App\Containers\HealthSelfDeclaration\Actions\UpdateHealthSelfDeclarationAction;
use App\Containers\HealthSelfDeclaration\Data\Transporters\UpdateHealthSelfDeclarationTransporter;
use App\Containers\HealthSelfDeclaration\Models\HealthSelfDeclaration;
use App\Containers\HealthSelfDeclaration\Tests\TestCase;
use Illuminate\Support\Facades\App;

/**
 * Class UpdateHealthSelfDeclarationTest.
 *
 * @group health-self-declaration
 * @group unit
 */
class UpdateHealthSelfDeclarationTest extends TestCase
{
    public function testUpdateHealthSelfDeclarationTest(): void
    {
        $healthSelfDeclaration = factory(HealthSelfDeclaration::class)->create();

        $HealthSelfDeclarationNewData = [
            'health_self_declaration_id' => $healthSelfDeclaration->id,
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

        $transporter = new UpdateHealthSelfDeclarationTransporter($HealthSelfDeclarationNewData);
        $action = App::make(UpdateHealthSelfDeclarationAction::class);
        $updatedHealthSelfDeclaration = $action->run($transporter);

        $this->assertEquals($HealthSelfDeclarationNewData['health_self_declaration_id'], $updatedHealthSelfDeclaration->id);
        $this->assertEquals(json_encode($HealthSelfDeclarationNewData['health_options'], JSON_THROW_ON_ERROR), $updatedHealthSelfDeclaration->health_options);
        $this->assertEquals($HealthSelfDeclarationNewData['blood_type'], $updatedHealthSelfDeclaration->blood_type);
    }
}
