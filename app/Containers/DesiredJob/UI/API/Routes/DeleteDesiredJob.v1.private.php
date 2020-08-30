<?php

/**
 * @apiGroup           DesiredJob
 * @apiName            deleteDesiredJob
 *
 * @api                {DELETE} /v1/desired-job/:id Endpoint title here..
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
$router->delete('desired-job/{id}', [
    'as' => 'api_desiredjob_delete_desired_job',
    'uses'  => 'Controller@deleteDesiredJob',
    'middleware' => [
      'auth:api',
    ],
]);
