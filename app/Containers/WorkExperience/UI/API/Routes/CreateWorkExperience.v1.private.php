<?php

/**
 * @apiGroup           WorkExperience
 * @apiName            createWorkExperience
 *
 * @api                {POST} /v1/users/:user_id/work-experiences Endpoint title here..
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
$router->post('users/{user_id}/work-experiences', [
    'as' => 'api_workexperience_create_work_experience',
    'uses'  => 'Controller@createWorkExperience',
    'middleware' => [
      'auth:api',
    ],
]);
