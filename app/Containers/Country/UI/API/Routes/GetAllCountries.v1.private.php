<?php

/**
 * @apiGroup           Country
 * @apiName            getAllCountries
 *
 * @api                {GET} /v1/countries Get All Countries
 * @apiDescription     Get all countries
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiUse             CountrySuccessMultipleResponse
 */

/** @var Route $router */
$router->get('countries', [
    'as' => 'api_country_get_all_countries',
    'uses' => 'Controller@getAllCountries',
]);
