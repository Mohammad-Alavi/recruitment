<?php

/**
 * @apiGroup           DesiredJob
 * @apiName            findDesiredJobById
 *
 * @api                {GET} /v1/desired-job/:id Endpoint title here..
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
$router->get('desired-job/{id}', [
    'as' => 'api_desiredjob_find_desired_job_by_id',
    'uses'  => 'Controller@findDesiredJobById',
    'middleware' => [
      'auth:api',
    ],
]);
