<?php

/**
 * @apiGroup           ActivityDomain
 * @apiName            createActivityDomain
 *
 * @api                {POST} /v1/activity-domains Endpoint title here..
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
$router->post('activity-domains', [
    'as' => 'api_activitydomain_create_activity_domain',
    'uses'  => 'Controller@createActivityDomain',
    'middleware' => [
      'auth:api',
    ],
]);
