<?php

/**
 * @apiGroup           Address
 * @apiName            createAddress
 *
 * @api                {POST} /v1/addresses Endpoint title here..
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
$router->post('addresses', [
    'as' => 'api_address_create_address',
    'uses'  => 'Controller@createAddress',
    'middleware' => [
      'auth:api',
    ],
]);
