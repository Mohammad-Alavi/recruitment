<?php

/**
 * @apiGroup           ActivityDomain
 * @apiName            getAllActivityDomains
 *
 * @api                {GET} /v1/activity-domains Endpoint title here..
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
$router->get('activity-domains', [
    'as' => 'api_activitydomain_get_all_activity_domains',
    'uses'  => 'Controller@getAllActivityDomains',
    'middleware' => [
      'auth:api',
    ],
]);
