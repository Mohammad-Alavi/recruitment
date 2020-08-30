<?php

/**
 * @apiGroup           Job
 * @apiName            findJobById
 *
 * @api                {GET} /v1/jobs/:id Endpoint title here..
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
$router->get('jobs/{id}', [
    'as' => 'api_job_find_job_by_id',
    'uses'  => 'Controller@findJobById',
    'middleware' => [
      'auth:api',
    ],
]);
