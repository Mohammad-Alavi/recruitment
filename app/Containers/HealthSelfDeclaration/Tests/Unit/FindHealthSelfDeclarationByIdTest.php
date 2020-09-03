<?php

namespace App\Containers\HealthSelfDeclaration\Tests\Unit;

use App\Containers\HealthSelfDeclaration\Actions\FindHealthSelfDeclarationByIdAction;
use App\Containers\HealthSelfDeclaration\Data\Transporters\FindHealthSelfDeclarationByIdTransporter;
use App\Containers\HealthSelfDeclaration\Models\HealthSelfDeclaration;
use App\Containers\HealthSelfDeclaration\Tests\TestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\App;

/**
 * Class FindHealthSelfDeclarationByIdTest.
 *
 * @group health-self-declaration
 * @group unit
 */
class FindHealthSelfDeclarationByIdTest extends TestCase
{
    public function testFindHealthSelfDeclarationById(): void
    {
        $healthSelfDeclaration = factory(HealthSelfDeclaration::class)->create();

        $findTransporter = new FindHealthSelfDeclarationByIdTransporter([
            'health_self_declaration_id' => $healthSelfDeclaration->id
        ]);
        $findAction = App::make(FindHealthSelfDeclarationByIdAction::class);
        $foundHealthSelfDeclaration = $findAction->run($findTransporter);

        $this->assertInstanceOf(HealthSelfDeclaration::class, $foundHealthSelfDeclaration);
        $this->assertEquals($foundHealthSelfDeclaration->id, $healthSelfDeclaration->id);
    }

    public function testThrowExceptionIfHealthSelfDeclarationNotFound(): void
    {
        $this->expectException(NotFoundException::class);

        // No HealthSelfDeclaration with id of 7777 exist
        $findTransporter = new FindHealthSelfDeclarationByIdTransporter([
            'health_self_declaration_id' => 7777,
        ]);
        $findAction = App::make(FindHealthSelfDeclarationByIdAction::class);
        $findAction->run($findTransporter);
    }
}
