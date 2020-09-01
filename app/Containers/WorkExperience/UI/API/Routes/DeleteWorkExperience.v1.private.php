<?php

/**
 * @apiGroup           WorkExperience
 * @apiName            deleteWorkExperience
 *
 * @api                {DELETE} /v1/users/:user_id/work-experiences/:id Endpoint title here..
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
$router->delete('users/{user_id}/work-experiences/{id}', [
    'as' => 'api_workexperience_delete_work_experience',
    'uses'  => 'Controller@deleteWorkExperience',
    'middleware' => [
      'auth:api',
    ],
]);
