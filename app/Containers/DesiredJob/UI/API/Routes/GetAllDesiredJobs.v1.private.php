<?php

/**
 * @apiGroup           DesiredJob
 * @apiName            getAllDesiredJobs
 *
 * @api                {GET} /v1/desired-job Endpoint title here..
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
$router->get('desired-job', [
    'as' => 'api_desiredjob_get_all_desired_jobs',
    'uses'  => 'Controller@getAllDesiredJobs',
    'middleware' => [
      'auth:api',
    ],
]);
