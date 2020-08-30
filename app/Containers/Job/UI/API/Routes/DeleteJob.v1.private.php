<?php

/**
 * @apiGroup           Job
 * @apiName            deleteJob
 *
 * @api                {DELETE} /v1/jobs/:id Endpoint title here..
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
$router->delete('jobs/{id}', [
    'as' => 'api_job_delete_job',
    'uses'  => 'Controller@deleteJob',
    'middleware' => [
      'auth:api',
    ],
]);
