<?php

/**
 * @apiGroup           ActivityDomain
 * @apiName            updateActivityDomain
 *
 * @api                {PATCH} /v1/activity-domains/:id Endpoint title here..
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
$router->patch('activity-domains/{id}', [
    'as' => 'api_activitydomain_update_activity_domain',
    'uses'  => 'Controller@updateActivityDomain',
    'middleware' => [
      'auth:api',
    ],
]);
