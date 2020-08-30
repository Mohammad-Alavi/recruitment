<?php

/**
 * @apiGroup           Job
 * @apiName            getAllJobs
 *
 * @api                {GET} /v1/jobs Endpoint title here..
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
$router->get('jobs', [
    'as' => 'api_job_get_all_jobs',
    'uses'  => 'Controller@getAllJobs',
    'middleware' => [
      'auth:api',
    ],
]);
