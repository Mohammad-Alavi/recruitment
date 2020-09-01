<?php

/**
 * @apiGroup           Address
 * @apiName            updateAddress
 *
 * @api                {PATCH} /v1/addresses/:id Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->patch('addresses/{id}', [
    'as' => 'api_address_update_address',
    'uses'  => 'Controller@updateAddress',
    'middleware' => [
      'auth:api',
    ],
]);
