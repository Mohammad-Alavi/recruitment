<?php

/**
 * @apiGroup           Job
 * @apiName            createJob
 *
 * @api                {POST} /v1/jobs Endpoint title here..
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
$router->post('jobs', [
    'as' => 'api_job_create_job',
    'uses'  => 'Controller@createJob',
    'middleware' => [
      'auth:api',
    ],
]);
