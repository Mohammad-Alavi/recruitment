<?php

namespace App\Containers\Country\UI\API\Tests\Functional;

use App\Containers\Country\Models\Country;
use App\Containers\Country\Tests\ApiTestCase;

/**
 * Class GetAllCountriesTest.
 *
 * @group country
 * @group api
 */
class GetAllCountriesTest extends ApiTestCase
{
    protected $endpoint = 'get@v1/countries';

	public function testGetAllCountriesAsAdmin(): void
	{
		$this->getTestingUser();

		$response = $this->makeCall();

		$response->assertStatus(200);
		$responseContent = $this->getResponseContentObject();
		$this->assertCount(202, $responseContent->data);
	}

	public function testSearchCountriesByName(): void
	{
		$this->getTestingUser();
		$searchTerm = 'یمن';

		$response = $this->endpoint($this->endpoint . "?search=name:{$searchTerm}")->makeCall();
		$response->assertStatus(200);
		$responseArray = $response->decodeResponseJson();

		$this->assertEquals($searchTerm, $responseArray['data'][0]['name']);
		$this->assertCount(1, $responseArray['data']);
	}
}
