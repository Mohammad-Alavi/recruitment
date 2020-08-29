<?php

namespace App\Containers\Country\Tests\Unit;

use App\Containers\Country\Actions\GetAllCountriesAction;
use App\Containers\Country\Data\Transporters\GetAllCountriesTransporter;
use App\Containers\Country\Tests\TestCase;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\App;

/**
 * Class GetAllCountriesTest.
 *
 * @group country
 * @group unit
 */
class GetAllCountriesTest extends TestCase
{
	public function testGetAllCountries(): void
	{
		$transporter = new GetAllCountriesTransporter();
		$action = App::make(GetAllCountriesAction::class);
		$countries = $action->run($transporter);

		$this->assertEquals(202, $countries->count());
	}
}
