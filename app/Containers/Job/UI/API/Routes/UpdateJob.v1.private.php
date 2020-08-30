<?php

/**
 * @apiGroup           Job
 * @apiName            updateJob
 *
 * @api                {PATCH} /v1/jobs/:id Endpoint title here..
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
$router->patch('jobs/{id}', [
    'as' => 'api_job_update_job',
    'uses'  => 'Controller@updateJob',
    'middleware' => [
      'auth:api',
    ],
]);
