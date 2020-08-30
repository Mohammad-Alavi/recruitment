<?php

/**
 * @apiGroup           ActivityDomain
 * @apiName            deleteActivityDomain
 *
 * @api                {DELETE} /v1/activity-domains/:id Endpoint title here..
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
$router->delete('activity-domains/{id}', [
    'as' => 'api_activitydomain_delete_activity_domain',
    'uses'  => 'Controller@deleteActivityDomain',
    'middleware' => [
      'auth:api',
    ],
]);
