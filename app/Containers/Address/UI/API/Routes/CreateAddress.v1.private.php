<?php

/**
 * @apiGroup           Address
 * @apiName            createAddress
 *
 * @api                {POST} /v1/users/:user_id/addresses Create Address
 * @apiDescription     Create an Address for the User
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiParam           {String} address required|min:5|max:400,
 * @apiParam           {String} province_id required|exists:locations,id,
 * @apiParam           {String} city_id required|exists:locations,id,
 *
 * @apiUse             AddressSuccessSingleResponse
 */

/** @var Route $router */
$router->post('users/{user_id}/addresses', [
    'as' => 'api_address_create_address',
    'uses'  => 'Controller@createAddress',
    'middleware' => [
      'auth:api',
    ],
]);
