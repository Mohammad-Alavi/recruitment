<?php

/**
 * @apiGroup           Address
 * @apiName            updateAddress
 *
 * @api                {PATCH} /v1/users/:user_id/addresses/:address_id Update Address
 * @apiDescription     Update Address
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiParam           {String} address min:5|max:400,
 * @apiParam           {String} province_id exists:locations,id,
 * @apiParam           {String} city_id exists:locations,id,
 *
 * @apiUse             AddressSuccessSingleResponse
 */

/** @var Route $router */
$router->patch('users/{user_id}/addresses/{address_id}', [
    'as' => 'api_address_update_address',
    'uses'  => 'Controller@updateAddress',
    'middleware' => [
      'auth:api',
    ],
]);
