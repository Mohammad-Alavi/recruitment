<?php

namespace App\Containers\EducationalBackground\Tests\Unit;

use App\Containers\EducationalBackground\Actions\DeleteEducationalBackgroundAction;
use App\Containers\EducationalBackground\Data\Transporters\DeleteEducationalBackgroundTransporter;
use App\Containers\EducationalBackground\Models\EducationalBackground;
use App\Containers\EducationalBackground\Tests\TestCase;
use App\Ship\Exceptions\DeleteResourceFailedException;
use Illuminate\Support\Facades\App;

/**
 * Class DeleteEducationalBackgroundTest.
 *
 * @group educational-background
 * @group unit
 */
class DeleteEducationalBackgroundTest extends TestCase
{
	public function testDeleteEducationalBackground(): void
	{
		$educationalBackground = factory(EducationalBackground::class)->create();

		$deleteTransporter = new DeleteEducationalBackgroundTransporter(['educational_background_id' => $educationalBackground->id]);
		$deleteAction = App::make(DeleteEducationalBackgroundAction::class);
		$deleteAction->run($deleteTransporter);

		$this->assertDeleted('educational_backgrounds', ['id' => $educationalBackground->id]);
	}

	public function testThrowExceptionIfFailedToDeleteEducationalBackground(): void
	{
		$this->expectException(DeleteResourceFailedException::class);

		$deleteTransporter = new DeleteEducationalBackgroundTransporter(['educational_background_id' => 7777]);
		$deleteAction = App::make(DeleteEducationalBackgroundAction::class);
		$deleteAction->run($deleteTransporter);
	}
}
