<?php

namespace App\Containers\ActivityDomain\UI\API\Tests\Functional;

use App\Containers\ActivityDomain\Tests\ApiTestCase;

/**
 * Class GetAllActivityDomainsTest.
 *
 * @group activity-domain
 * @group api
 */
class GetAllActivityDomainsTest extends ApiTestCase
{
    protected $endpoint = 'get@v1/activity-domains';

    public function testGetAllActivityDomainsAsAdmin(): void
    {
        $this->getTestingUser();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();
        $this->assertCount(5, $responseContent->data);
    }

    public function testSearchActivityDomainsByName(): void
    {
        $this->getTestingUser();
        $searchTerm = 'مالی';

        $response = $this->endpoint($this->endpoint . "?search=name:{$searchTerm}")->makeCall();

        $response->assertStatus(200);
        $responseArray = $response->decodeResponseJson();

        $this->assertEquals($searchTerm, $responseArray['data'][0]['name']);
        $this->assertCount(1, $responseArray['data']);
    }
}
